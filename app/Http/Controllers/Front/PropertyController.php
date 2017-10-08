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
        
    }
 
    public function show($id){
        $product = Product::find($id);

        //Locations
        $locations = [];
 
        //Features
        $visibleFeatures = Feature::basicFeatures();
        $features = []; 
        foreach($visibleFeatures->all() as $feature){
            $active = $product->features()->find($feature->id) != null;
            $features[] = array(
                'id' => $feature->id,
                'active' => $active,
                'name' => $feature->name
            );
        }
        
        //Similar
        $similarProducts = Product::similar($product)->get();

        //Comments - It will not be implemented.
        $comments = [];
        return view('pages.front.property', compact(
            'product',
            'locations',
            'features',
            'similarProducts',
            'comments'));
    }

}
