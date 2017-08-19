<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOffer extends Model
{
    protected $fillable = [
        "product_id",
        "user_id",
        "contact_id",
        "value",
        "operation"
    ];

    public function product(){
        return $this->belongsTo("App\Product");
    }

    public function seller(){
        return $this->hasOne("App\User", "id", "user_id");
    }

    public function contact(){
        return $this->hasOne("App\Contact", "id", "contact_id");
    }
}
