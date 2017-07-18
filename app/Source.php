<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    protected $table = 'contact_sources';

    public function contacts(){
        $this->belongsToMany('App\Contact');
    }
}
