<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
 

class Task extends Model
{
    protected $fillable = [
        "task_kind_id",
        "user_id",
        "start_date",
        "end_date", 
        "description"
    ];

    public function feedbacks(){
        return $this->belongsToMany('App\FeedbackType', 'task_feedbacks');
    }

    public function kind(){
        return $this->hasOne('App\TaskKind', 'id', 'task_kind_id');
    } 
    
    public function product(){
        return $this->hasOne('App\Product', 'id', 'product_id');
    } 

    public function contact(){
        return $this->hasOne('App\Contact', 'id', 'contact_id');
    } 

    public function creator(){
        return $this->hasOne('App\User', 'id', 'creator_id');
    } 

    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    } 

    public function scopeToday($query){
        return $query
            ->where('start_date', '>=', Carbon::today())
            ->where('start_date', '<', Carbon::today()->addDay(1))
            ->sortByDesc('start_date')
            ->get();
    }


    public function scopeWeek($query){
        return $query
            ->where('start_date', '>=', Carbon::today())
            ->where('start_date', '<', Carbon::today()->addWeek(1))
            ->sortByDesc('start_date')
            ->get();
    }


    public function scopeMonth($query){
        return $query
            ->where('start_date', '>=', Carbon::today())
            ->where('start_date', '<', Carbon::today()->addMonth(1))
            ->sortByDesc('start_date')
            ->get();
    }

} 