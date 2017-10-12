<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImageType extends Model
{
    public function images(){
        return $this->belongsToMany('App\ProductImage');
    }

    public function getTextAttribute(){
        return __('kinds.'.$this->name);
    }
}
