<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
 

class ProductStatus extends Model
{
    protected $table = 'product_statuses';

    public function products(){
        return $this->belongsToMany('App\Model\Product', 'products');
    }
}
