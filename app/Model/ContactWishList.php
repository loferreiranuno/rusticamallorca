<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactWishList extends Model
{
    protected $fillable = ['contact_id', 'product_id', 'interested'];

    public function contact(){
        return $this->hasOne('App\Contact', 'id', 'contact_id');
    }

    public function product(){
        return  $this->hasOne('App\Product', 'id', 'product_id');
    }

    public function user(){
       return  $this->hasOne('App\User', 'id', 'user_id');
    }

}
