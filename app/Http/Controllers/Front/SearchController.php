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
        if($request->has('search_field')){
            $request['city_name'] = $request->get('search_field');
        }

        $results = Product::Search($request);

        $minPrice = 0; $maxPrice = 0;
        $rentRange = [
            'min'=> $results->min('renting_cost'),
            'max'=> $results->max('renting_cost')
        ];

        $saleRange = [
            'min'=> $results->min('selling_cost'),
            'max'=> $results->max('selling_cost')
        ];
        
        if($request->has('sell_type')){
            switch($request->get('sell_type')){
                case "rent": 
                    $minPrice = $rentRange['min'];
                    $maxPrice = $rentRange['max'];
                break;
                case "sale": 
                    $minPrice = $saleRange['min'];
                    $maxPrice = $saleRange['max'];
                break;
                default:
                    $minPrice = ($rentRange['min'] < $saleRange['min']) ? $rentRange['min'] : $saleRange['min'];
                    $maxPrice = ($rentRange['max'] > $saleRange['max']) ? $rentRange['max'] : $saleRange['max']; 
                break;
            }
        }

        $price = "$minPrice;$maxPrice";
        if($request->has('price')){
            $price = $request->get('price');
            $priceSplit = explode(";" , $price); 
            $request['min_price'] =  $priceSplit[0];
            $request['max_price'] = $priceSplit[1]; 
            
            $results = Product::Search($request);
        
        }

        $products = $results->paginate($this->RESULTS_PER_PAGE);

        //return $request->all();
        
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

        $minPrice = Product::MinRentPrice() ?? 0;
        $maxPrice = Product::MaxSalePrice() ?? 9999999;
        return view('pages.front.search',compact('products','locations','price', 'minPrice', 'maxPrice'));
    }
}
