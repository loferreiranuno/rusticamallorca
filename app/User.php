<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Task;
use App\Contact;
use Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password' 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function contactsCreated(){
        return $this->hasMany('App\Contact', 'creator_id', 'id');
    }

    public function contactsReponsible(){
        return $this->hasMany('App\Contact', 'responsable_id', 'id');
    }

    public function tasks(){
        return $this->hasMany("App\Task", 'user_id', 'id')->orderBy('start_date', 'DESC');
    }

    public function productsCreated(){
        return $this->hasMany("App\Product", 'creator_id', 'id')->orderBy('created_at', 'DESC');
    } 

    public function productsRecruited(){
        return $this->hasMany("App\Product", 'recruiter_id', 'id');
    }

    public function productsManaged(){
        return $this->hasMany("App\Product", 'manager_id', 'id');
    }

    public function scopeTodayTasks(){
        return $this
            ->hasMany("App\Task", 'user_id', 'id')
            ->where('start_date', '>=', Carbon\Carbon::today())
            ->where('start_date', '<',  Carbon\Carbon::today()->addWeek(1))
            ->orderBy('start_date')
            ->get();
    }

    public function scopeSearch($query, array $request){
        
        if(isset($request["searchQuery"])){

            $searchQuery = $request["searchQuery"];
            if(trim($searchQuery) != ""){
                $query->where(function($query) use ($searchQuery){
                    $query->orWhere('email','LIKE', '%'.$searchQuery.'%')
                    ->orWhere('name', 'LIKE', '%' . $searchQuery . '%');
                });
            }
        }
        return $query;
    }
}
