<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDescription extends Model
{
    protected $table = 'product_descriptions';

    protected $fillable = [
        'product_id',
        'locale',
        'description'
    ];

    public function product(){
        return $this->belongsTo('App\Product');
    }
}
