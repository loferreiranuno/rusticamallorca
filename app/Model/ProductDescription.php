<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDescription extends Model
{
    protected $table = 'product_descriptions';
    public $timestamps = false;
    protected $fillable = [ 
        'language_id',
        'description'
    ];

    public function product(){
        return $this->hasOne('App\Product');
    }

    public function languages(){
        return $this->hasOne('App\Language');
    }
}
