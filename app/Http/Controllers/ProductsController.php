<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Http\Requests\ProductRequest;
use App\Product;
use App\ProductKindType;
use App\Language;
use App\ProductDescription;
use App\Feature;
 
class ProductsController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');   
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('pages.back.productList', compact('products'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {     
        return View::make('pages.back.productEdit'); 
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->all());
        $product->save(); 
        $this->update_combined_features($product, $request);
        return redirect()->route('product.edit', ['id'=> $product->id]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id); 

        if($product == null)
            return redirect()->route('product.index'); 
        
        return view('pages.back.product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $product = Product::find($id); 
        return View::make('pages.back.productEdit')->with('product', $product); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {        
        $product = Product::find($id);         
        $product->update($request->all());
     
        $this->update_combined_features($product, $request);
     
        return redirect()->route('product.edit', ['id'=> $product->id]);
    }

    private function update_combined_features($product, $request){
        //Get Product Translations;
        foreach(Language::all() as $lang){            
            $iDescription = $request->get('descriptions'.$lang->id);
            
            if(isset($iDescription) && !empty($iDescription)){

                $translation = $product->descriptions->where('language_id', $lang->id)->first();
                if($translation != null){
                    $translation->description = $iDescription;
                    $translation->save();
                }else{                
                    $pDescription = new ProductDescription([
                        'language_id'=> $lang->id,
                        'description'=> $iDescription 
                    ]);

                    $product->descriptions()->save( $pDescription);
                }
            }
        } 
         
        foreach(Feature::all() as $item){ 
            $value = $request->get("feature-".$item->id);
            if($value){
                if($product->features->where('feature_id', $item->id)==null){
                    $product->features()->save($item);
                }                
            }else{
                $product->features->pull($item->id);
            } 
        } 

        $product->save();

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->destroy();
    }
}
