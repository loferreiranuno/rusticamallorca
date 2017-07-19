<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    static $fillable = [ 
        'filename'
    ];

    public function products(){
        return $this->belongsToMany('App\Model\Product', 'product_images',
        'product_id', 'id');
    }
}
