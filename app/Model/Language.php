<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public function products(){
        $this->belongsToMany('App\ProductDescription');
    }
}
