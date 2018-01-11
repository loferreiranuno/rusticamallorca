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
        $this->middleware('language');
    }

    public function index(){

       
        $location = [
            'name' => 'Mallorca, España'
        ];

        $categories = [
            'apartments' => [
                'total' => Product::GetAllApartments()->count(),
                'url' => route('front.search',['category'=>'apartments'])
            ],
            'rusticHouses' => [
                'total' => Product::GetAllRusticHouses()->count(),
                'url' => route('front.search',['category'=>'rusticHouses'])
            ],
            'floors' => [
                'total' => Product::GetAllFloors()->count(),
                'url' => route('front.search',['category'=>'floors'])
            ],
            'luxuryHouses' => [
                'total' => Product::GetAllLuxuryHouses()->count(),
                'url' => route('front.search',['category'=>'luxuryHouses'])
            ],
            'housesWithPool' => [
                'total' => Product::GetAllPoolHouses()->count(),
                'url' => route('front.search',['category'=>'housesWithPool'])
            ],            
        ];


        $products = Product::orderBy('created_at')->get()->take(4);        
        
        return view('pages.front.home', compact('categories', 'location', 'products'));
    }

    public function setLanguage (Request $request){
        if($request->has('language')){

            $languageCode = $request->get('language');
            Session::put('locale', $languageCode);
            App::setLocale($languageCode); 
            return [
                "success"=> true, 
                "language"=> $languageCode, 
                "locale" => App::getLocale()];                
        }else{
            return ["success"=> false];
        }
    }
}
