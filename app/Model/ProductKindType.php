<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductKindType extends Model
{
    protected $table = 'product_kinds';

    public function products(){
        return $this->belongsToMany('App\Product');
    }
    
    public function productInterest(){
        return $this->belongsToMany('App\ContactInterest');
    }

    public function getTextAttribute(){
        return __("kinds.".$this->name);
    }
}
