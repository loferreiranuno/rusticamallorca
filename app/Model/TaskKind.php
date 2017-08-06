<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TaskKind extends Model
{
    protected $table = 'task_kinds';

    public function products(){
        $this->belongsToMany('App\Tasks');
    }
}
