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
use App\Repositories\Product\IProductRepository;
 
class ProductsController extends Controller
{
    private $productRepository;
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(IProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
        $this->middleware('auth');   
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productRepository->getAll();
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
        $product = $this->productRepository->get($id); 

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
        return redirect()->route('product.edit', ['id'=> $product->id]);
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
}
