<?php

namespace App;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use App\Product;

class Contact extends Model
{
    protected $fillable = [             
             'creator_id', 
             'responsable_id', 
             'partner_id', 
             'kind_id', 
             'step_id', 
             'lang_id', 
             'source_id', 
             'name', 
             'email', 
             'alias', 
             'phone', 
             'phone_alt', 
             'nif', 
             'address', 
             'city', 
             'note'
    ];
 
    public function creator(){
        return $this->hasOne('App\User', 'id', 'creator_id');
    }

    public function responsable(){
        return $this->hasOne('App\User', 'id', 'responsable_id');
    }

    // public function partner(){
    //     return $this->hasOne('App\Contact', 'partner_id', 'responsable_id');
    // }

    public function kind(){
        return $this->hasOne('App\ContactKind', 'id', 'kind_id');
    }

    public function step(){
        return $this->hasOne('App\ContactStep', 'id', 'step_id');
    }

    public function language(){
        return $this->hasOne('App\Language', 'id', 'lang_id');
    }

    public function source(){
        return $this->hasOne('App\ContactSource', 'id', 'source_id');
    }

    public function ownedProducts(){
        return $this->hasMany('App\Product', 'owner_id', 'id');
    }

    public function partnerProducts(){
        return $this->hasMany('App\Product', 'partner_id', 'id');
    }

    public function getFullAddressAttribute(){
        return $this->address . " " . $this->city;
    }
    
    public function tasks(){
        return $this
            ->hasMany('App\Task', 'contact_id', 'id')
            ->orderBy('start_date');
    }

    public function interest(){
        return $this
            ->hasOne('App\ContactInterest', 'contact_id', 'id');
    }

    public function getSuggestedProductsAttribute(){
         
        $interest =  $this->interest;
        if($interest == null)
            return null;
        
        $filterProducts = $this->wishList()->pluck('product_id')->toArray();
        return Product::filterByInterest($interest)->whereNotIn('id', $filterProducts)->get();
    }

    public function getFavouriteListAttribute(){
        return $this
            ->wishList()
            ->where('interested','=',1)
            ->get();
    }

    public function getDiscardedListAttribute(){
        return $this
            ->wishList()
            ->where('interested','=',0)
            ->get();
    }

    public function wishList(){
        return $this->hasMany('App\ContactWishList');
    }

    public function scopeSearch($query, array $request){
        
        if(isset($request["searchQuery"])){

            $searchQuery = $request["searchQuery"];
            if(trim($searchQuery) != ""){
                $query->where(function($query) use ($searchQuery){
                    $query->orWhere('email','LIKE', '%'.$searchQuery.'%')
                    ->orWhere('name', 'LIKE', '%' . $searchQuery . '%')
                    ->orWhere('phone','LIKE', '%'.$searchQuery.'%')
                    ->orWhere('phone_alt', 'LIKE', '%' . $searchQuery . '%');
                });
            }
        }

        if(isset($request['responsable'])){

            $responsableId = $request['responsable'];
            if(trim($responsableId)){
                $query->where('responsable_id','=', $responsableId);
            }
        }

        if(isset($request['step'])){

            $stepId = $request['step'];
            if(trim($stepId) != ""){
                $query->where('step_id','=', $stepId);
            }
        }

        return $query;

    }
}