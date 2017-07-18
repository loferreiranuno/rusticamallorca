<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgreementType extends Model
{
    protected $table = 'agreement_types';

    protected $fillable = [
        'name'
    ]; 

    public function products(){
        return $this->belongsToMany('App\Product', 'products');
    }
}
