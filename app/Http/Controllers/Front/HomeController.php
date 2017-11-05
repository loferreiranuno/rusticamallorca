<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;
use App\Product;
use App\ProductKindType;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(){

        $location = [
            'name' => 'Mallorca, España'
        ];

        $products = Product::orderBy('created_at')->get()->take(4);
 
        $categories = [
            'apartments' => [
                'total' => 0,
                'url' => ''
            ],
            'rusticHouses' => [
                'total' => 0,
                'url' => ''
            ],
            'floors' => [
                'total' => 0,
                'url' => ''
            ],
            'luxuryHouses' => [
                'total' => 0,
                'url' => ''
            ],
            'housesWithPool' => [
                'total' => 0,
                'url' => ''
            ],            
        ];
        
        return view('pages.front.home', compact('categories', 'location', 'products'));
    }

    public function setLanguage (Request $request){
        if($request->has('language')){
            $languageCode = $request->get('language');
            Session::put('language', $languageCode);
            return ["success"=> true, "language"=> $languageCode, "session"=> Session::get('language')];                
        }else{
            return ["success"=> false];
        }
    }
}
