<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactStep extends Model
{
     protected $fillable=['name'];

     public function contacts(){
         $this->belongsToMany('App\Contact');
     }
}
