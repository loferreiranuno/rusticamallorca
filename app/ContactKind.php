<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactKind extends Model
{
    protected $table = 'contact_kinds';
    protected $fillable = [];

    public function contacts(){
        return $this->hasMany('App\Contact', 'kind_id');
    }
}
