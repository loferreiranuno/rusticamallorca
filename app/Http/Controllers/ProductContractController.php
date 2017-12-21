<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelTemplate;
use App\ModelTemplateType;
use App\Product;
use App\Contact;
use App\Contract;
use App\User;

use App\Http\Requests\ContractRequest;

class ProductContractController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');     
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $product = Product::findOrFail($request->get("product"));
        $templateTypes = ModelTemplateType::all();

        $currentType = $templateTypes[0];
        if($request->has("type")){
            $currentType = ModelTemplateType::findOrFail($request->get("type"));
        }           
        return view('pages.back.productContractList', compact('product', 'templateTypes', 'currentType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $contract = null;
        if($request->has("contract")){
            $contract = Contract::findOrFail($request->get("contract"));
            $product = $contract->product;
            $templateType = $contract->template->templateType;
        }else{

            $templateTypeId = $request->get("type");
            $templateType = ModelTemplateType::findOrFail($templateTypeId);
            $productId = $request->get("product");
            $product = Product::findOrFail($productId);
        } 
        
        $hours = [];
        for($hour = 0; $hour < 24; $hour++){
            for($minutes = 0; $minutes < 60; $minutes++){
                if($minutes % 15 == 0){
                    $value =sprintf("%02d", $hour).":".sprintf("%02d", $minutes);
                    $hours[$value] = $value;
                }
            }
        }

        $contacts = Contact::others();
        $users = User::all();
        $owners = Contact::owners();
        $templates = $templateType->templates;

        return view('pages.back.productContractEdit', compact('contract', 'owners', 'templates', 'contacts', 'users', 'product', 'hours', 'templateType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContractRequest $request)
    {        
        $contract = Contract::create($request->all());
        $contract->save();
        return redirect()->route('product_contract.index',['product'=>$contract->product]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contract = Contract::findOrFail($id);
        
        $html = $contract->template->text;

        return view('pages.back.productContract', compact('html'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contract = Contract::findOrFail($id); 
        return redirect()->route('product_contract.create',['contract' => $contract->id]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContractRequest $request, $id)
    {
        $contract = Contract::findOrFail($id); 
        $contract->update($request->all());
        $contract->save();
        return redirect()->route('product_contract.index',[
            'type'=> $contract->template->templateType->id,
            'product' => $contract->product->id]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contract = Contract::findOrFail($id);
        if($contract->delete())
        {
            return [
                "success"=> false
            ] ;
        }
        
        return [
            "success"=> false
        ];
    }
}
