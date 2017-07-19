<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnergyCertificate extends Model
{
    public function products(){
        return $this->belongsToMany('App\Model\Product', 'products');
    }
}
