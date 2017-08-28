<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductOfferRequest;
use Illuminate\Support\Facades\Response;
use App\ProductOffer;
use App\Product;
use App\ProductStatus;
use Auth;
class ProductOfferController extends Controller
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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductOfferRequest $request)
    {
        $offer = ProductOffer::create($request->all());
        $offer->user_id = Auth::id();
        $offer->save(); 
        
        return Response::json([
            'error' => false,
            'code'  => 200
        ], 200); 

    }

    public function markAsSold($offer){
            
            $offer = ProductOffer::find($offer);
            $offer->sold = true;            
            $offer->save();

            $product = $offer->product;
            return redirect()->route('product.show', ['id' => $product->id]); 

    }
    
    public function markAsRejected($offer){

            $offer = ProductOffer::find($offer);
            $offer->sold = false;            
            $offer->rejected = true;
            $offer->save();

            $product = $offer->product;
            return redirect()->route('product.show', ['id' => $product->id]); 
            
    }
    
    public function markAsRented($offer){

            $offer = ProductOffer::find($offer);
            $offer->sold = true;            
            $offer->save();
            
            $product = $offer->product;
            return redirect()->route('product.show', ['id' => $product->id]); 
            
            
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offer = ProductOffer::find($id);
        $product_id = $offer->product->id; 
        $offer->delete();
        return redirect()->route('product.show', ['id' => $product_id]); 
            
        // return Response::json([
        //     'error' => false,
        //     'code'  => 200
        // ], 200); 
    }
}
