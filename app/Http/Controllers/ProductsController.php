<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Input;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\ProductKindType;
use App\Language;
use App\ProductDescription;
use App\Feature;
use Auth;
use App\Repositories\Product\IProductRepository;
use App\Repositories\Task\ITaskRepository;
use Illuminate\Support\Facades\Response;
 
class ProductsController extends Controller
{
    private $TOTAL_PAGES = 25;
    private $productRepository;
    private $taskRepository;
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(IProductRepository $productRepository, ITaskRepository $taskRepository)
    {
        $this->middleware('auth');    
        $this->productRepository = $productRepository;
        $this->taskRepository = $taskRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
         
        if($request->has('search')){
            $products = $this->productRepository->search($request, $this->TOTAL_PAGES)->appends(Input::except('page'));
        }else{
            $products = $this->productRepository->getAll($this->TOTAL_PAGES);
        }

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
        $product = $this->productRepository->create($request->all());
        
        return redirect()->route('product.show', ['id'=> $product->id]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        $product = $this->productRepository->get($id); 

        if($product == null)
            return redirect()->route('product.index'); 


        $taskByDay = [];
        if($product->tasks != null){
             $taskByDay = $this->taskRepository->groupByDay($product->tasks);
        }
        
        return view('pages.back.product', compact('product', 'taskByDay'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $product = $this->productRepository->get($id); 
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
        $product = $this->productRepository->update($id, $request->all());        
        return redirect()->route('product.show', ['id'=> $product->id]);
    }

    public function updateFeatures(Request $request, $id){
        $product = $this->productRepository->putFeatures($id, $request->all());
        return Response::json([
            'error' => false,
            'code'  => 200
        ], 200); 
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productRepository->delete($id);
        return redirect()->route('product.index'); 
    } 

    
    public function getFields(Request $request){
        
        if($request->has("kind")){
            $kindId = $request->get("kind");
        }
        
        if(!isset($kindId)){
            $kindId = 1;
        }

        $kind = ProductKindType::find($kindId); 
        return Response::json([ 'fields' => ProductKindType::$KindAvailable[$kind->name] ]);
    }
}
