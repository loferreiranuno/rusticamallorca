<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactSource extends Model
{
    function contact(){
        $this->belongsToMany('App\Contact', 'source_id', 'id');
    }
}
