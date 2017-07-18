<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductKindType extends Model
{
    protected $table = 'product_kinds';

    public function products(){
        return $this->belongsToMany('App\Product', 'products');
    }
}
