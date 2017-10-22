<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentingPeriod extends Model
{
    
    public function products(){
        return $this->belongsToMany('App\Product', 'products');
    }

    public function getTextAttribute(){
        return __('kinds.'.$this->name);
    }
}
