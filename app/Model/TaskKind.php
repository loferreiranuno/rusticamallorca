<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskKind extends Model
{
    protected $table = 'task_kinds';

    public function products(){
        return $this->belongsToMany('App\Tasks');
    }
}
