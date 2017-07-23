<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicAccess extends Model
{
    protected $table = 'public_accesses';

    public function products(){
        return $this->belongsToMany('App\Product');
    }
}
