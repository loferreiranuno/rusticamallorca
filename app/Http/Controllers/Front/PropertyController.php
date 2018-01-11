<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Product;
use App\Feature;
use App\Http\Controllers\Controller;

class PropertyController extends Controller
{ 
    public function __construct()
    {
        $this->middleware('language');  
    }
 
    public function show($id){
        $product = Product::find($id);

        //Locations
        $locations = [];
        
        $features = []; 
        foreach($product->features as $feature){
            $features[] = array(
                'id' => $feature->id,
                'active' => true,
                'name' => $feature->name
            );
        } 

        //Similar
        $similarProducts = Product::similar($product)->get();

        //Same area
        $sameArea = Product::SameArea($product)->get();

        //Comments - It will not be implemented.
        $comments = [];
        return view('pages.front.property', compact(
            'product',
            'locations',
            'features',
            'similarProducts',
            'sameArea',
            'comments'));
    }

}
