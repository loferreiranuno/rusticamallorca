<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactInterest extends Model
{    
    protected $fillable = [
    
    'contact_id',
    'user_id',
    'bedroom_min',
    'bedroom_max',
    'bathroom_min',
    'bathroom_max',
    'area_min',
    'area_max',
    'sale_enabled',
    'sale_min',
    'sale_max',
    'rent_enabled',
    'rent_min',
    'rent_max',
    // 'min_floor',
    // 'area_window_min',
    // 'area_window_max',
    // 'celling_height_min',
    // 'celling_height_max'
    ]; 



    public function creator(){
        return $this->hasOne('App\User', 'id', 'user_id');
    } 

    public function contact(){
        return $this->hasOne('App\Contact', 'id', 'contact_id');
    }

    public function kind(){
        return $this->hasOne('App\ProductKindType', 'id', 'product_kind_id');
    }
}
