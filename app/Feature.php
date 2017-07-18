<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $table = 'features';

    protected $fillable = [
        'name'
    ];

    public function products(){
        return $this->belongsToMany('App\Product', 'product_features');
    }
}
