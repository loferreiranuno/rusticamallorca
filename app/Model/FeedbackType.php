<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FeedbackType extends Model
{
 
    public function tasks(){
        return $this->belongsToMany('App\Task', 'task_feedbacks');
    }
}
