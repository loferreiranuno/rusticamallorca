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
        return $this->hasOne("App\Product", "id", "product_id");
    }

    public function seller(){
        return $this->hasOne("App\User", "id", "user_id");
    }

    public function contact(){
        return $this->hasOne("App\Contact", "id", "contact_id");
    }

    public function getStatusAttribute(){
        if($this->rejected == 0){
            if($this->sold == 0){
                return "open";
            }else{
                return "accepted";
            }
        }else{
            return "rejected";
        }
    }
}
