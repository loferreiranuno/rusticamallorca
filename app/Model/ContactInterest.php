<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactInterest extends Model
{    
    protected $table = 'contact_interests';
    protected $primaryKey = 'id';
    protected $fillable = [
    
    'contact_id',
    'user_id',
    'bedroom_min',
    'bedroom_max',
    'bathroom_min',
    'bathroom_max',
    'area_min',
    'area_max',
    'sale_enabled',
    'sale_min',
    'sale_max',
    'rent_enabled',
    'rent_min',
    'rent_max', 
    ]; 



    public function creator(){
        return $this->hasOne('App\User', 'id', 'user_id');
    } 

    public function contact(){
        return $this->hasOne('App\Contact', 'id', 'contact_id');
    }

    public function kind(){
        return $this->hasOne('App\ProductKindType', 'id', 'product_kind_id');
    }
    
    public function getSaleAttribute(){
        return $this->sale_enabled > 0 && $this->sale_min <= $this->sale_max;
    }
    
    public function getRentAttribute(){
        return $this->rent_enabled > 0&& $this->rent_min <= $this->rent_max;
    }
 
 
}
