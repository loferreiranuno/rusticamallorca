<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElectricPowerSystem extends Model
{
    public function products(){
        return $this->belongsToMany('App\Model\Product', 'products');
    }
}
