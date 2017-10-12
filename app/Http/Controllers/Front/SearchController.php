<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product; 
use RMHelper;

class SearchController extends Controller
{
    public $RESULTS_PER_PAGE = 12;
    public function __construct()
    {
        
    }

    public function cities(Request $request){

        $name = $request->get('name');

        $cities =  Product::cities()
        ->where('city_name','like', '%'.$name.'%')
        ->get()
        ->all();

        $data = [];
        foreach($cities as $city){
            $data[] = $city->city_name;
        }
        return [
            'success'=> true,
            'data' => $data
        ];
    }

    public function index(Request $request)
    {
        $products = Product::paginate($this->RESULTS_PER_PAGE);

        $locations = array();
        foreach($products as $product){
            $priceLabel = "";

            if($product->salePrice != 0){
                $priceLabel .= $product->salePrice ."&euro;"; 
            }

            if($product->rentPrice != 0){
                $priceLabel .= $product->rentPrice ."&euro;"; 
            }
 
            $locations[] = [
                $product->title,
                RMHelper::getProductAddress($product),
                $priceLabel,
                $product->latitude,
                $product->longitude,
                route('property.show',['id'=> $product->id]),
                RMHelper::getProductImage($product, false)
            ];

        }

        return view('pages.front.search',compact('products','locations'));
    }
}
