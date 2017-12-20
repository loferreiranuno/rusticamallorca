<?php

namespace App;
 
use Illuminate\Database\Eloquent\Model;

class TaskKind extends Model
{
    protected $table = 'task_kinds';
 
    public function tasks(){
        return $this->hasMany('App\Task');
    }
}
