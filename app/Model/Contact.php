<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
             
    ];
 
    public function kind(){
        return $this->belongsTo('App\ContactKind', 'id', 'kind_id');
    }
}
