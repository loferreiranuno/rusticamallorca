<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductKindType extends Model
{
    protected $table = 'product_kinds';

    public function products(){ 
         return $this->hasMany('App\Product', 'product_kind_id', 'id')->get();
    }
    
    public function productInterest(){
        return $this->belongsToMany('App\ContactInterest');
    }

    public function getTextAttribute(){
        return __("kinds.".$this->name);
    }

    public static $KindAvailable = [
    "flat" => [ 
         "floors", 
         "rooms", 
         "bathrooms", 
         "area", 
         "area_util" 
    ],
     "villa" => [ 
         "building_floors", 
         "rooms", 
         "bathrooms",        
         "area",        
         "area_util",        
         "plot_area"
    ],
     "country house" => [ 
         "building_floors", 
         "rooms", 
         "bathrooms",        
         "area",        
         "area_util",        
         "plot_area"             
    ],
     "bungalow" => [ 
         "building_floors", 
         "rooms",        
         "bathrooms",        
         "area",        
         "area_util",        
         "plot_area" 
    ],
     "room" => [ 
         "floors", 
         "rooms",        
         "bathrooms",        
         "area",        
         "area_util"     
    ],
     "parking" => [ 
         "floors",         
         "area",       
        "area_util"
    ],
     "shop" => [        
         "floors",        
         "rooms",        
         "bathrooms",        
         "area",        
         "area_util",        
         "area_underground",        
         "area_first_floor",        
         "window_area",        
         "ceiling_height" 
    ],
     "industrial" => [
         "building_floors",
         "rooms",
         "bathrooms",
         "area",
         "area_util"
    ],
     "office" => [
         "floors",
         "rooms",
         "bathrooms",        
         "area",        
         "area_util"      
    ],
     "land" => [   
         "plot_area"
    ],
     "storage" => [        
         "floors",        
         "area",        
         "area_util" 
    ],
     "building" => [        
         "building_floors",        
         "building_floors_expand",        
         "building_front",        
         "building_depth",        
         "area",        
         "area_util",        
         "plot_area",        
         "division_license_id",        
         "electric_power_system_id"
     ],
    ];
}
