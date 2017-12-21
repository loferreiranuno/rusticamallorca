<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = 'contracts';
    protected $guarded = array();
    
    public function product(){        
        return $this->hasOne('App\Product', 'id', 'product_id');
    }
    public function template(){        
        return $this->hasOne('App\ModelTemplate', 'id', 'template_id');
    }
    public function creator(){        
        return $this->hasOne('App\User', 'id', 'creator_id');
    }
    public function comercial(){        
        return $this->hasOne('App\User', 'id', 'comercial_id');
    }
    public function visitor(){        
        return $this->hasOne('App\Contact', 'id', 'visitor_id');
    }
    public function buyer1(){        
        return $this->hasOne('App\Contact', 'id', 'first_buyer_id');
    }
    public function seller1(){        
        return $this->hasOne('App\Contact', 'id', 'first_seller_id');
    }
    public function owner1(){        
        return $this->hasOne('App\Contact', 'id', 'first_owner_id');
    }
    public function buyer2(){        
        return $this->hasOne('App\Contact', 'id', 'second_buyer_id');
    }
    public function seller2(){        
        return $this->hasOne('App\Contact', 'id', 'second_seller_id');
    }
    public function owner2(){        
        return $this->hasOne('App\Contact', 'id', 'second_owner_id');
    }
    public function lessor(){        
        return $this->hasOne('App\Contact', 'id', 'lessor_id');
    }
    public function lessee1(){        
        return $this->hasOne('App\Contact', 'id', 'first_lessee');
    }
    public function lessee2(){        
        return $this->hasOne('App\Contact', 'id', 'second_lessee');
    }
    
    public function lessee3(){        
        return $this->hasOne('App\Contact', 'id', 'third_lessee');
    }

    public function getColumnValuesAttribute()
    {
        $columns = [];
        $columns["id"] = $this->id;
        $columns["agreement.model"] = $this->template->name;
        $columns["agreement.date"] = $this->agreement_date;
        
        switch($this->template->templateType->code){
            case "down_payment":
            
                $columns["first.buyer"] = "";
                if($this->buyer1)
                    $columns["first.buyer"] = $this->buyer1->name;

                $columns["second.buyer"] = "";
                if($this->buyer2)
                    $columns["second.buyer"] = $this->buyer2->name;

                $columns["first.owner"] = "";
                if($this->owner1)
                    $columns["first.owner"] = $this->owner1->name;

                $columns["second.owner"] = "";
                if($this->owner2)
                    $columns["second.owner"] = $this->owner2->name;
            break;
            case "buyer_commission": 

                $columns["first.buyer"] = "";
                if($this->buyer1)
                    $columns["first.buyer"] = $this->buyer1->name;

                $columns["second.buyer"] = "";
                if($this->buyer2)
                    $columns["second.buyer"] = $this->buyer2->name;
            
            break;
            case "seller_commission": 
            
                $columns["first.seller"] = "";
                if($this->seller1)
                    $columns["first.seller"] = $this->seller1->name;

                $columns["second.seller"] = "";
                if($this->seller2)
                    $columns["second.seller"] = $this->seller2->name;

            break;
            case "key_return": 
                $columns["first.seller"] = "";
                if($this->seller1)
                    $columns["first.seller"] = $this->seller1->name;
            break;
            case "key_receive": 
                $columns["first.seller"] = "";
                if($this->seller1)
                    $columns["first.seller"] = $this->seller1->name;
            break;
            case "down_payment_receive":            
                $columns["first.buyer"] = "";
                if($this->buyer1)
                    $columns["first.buyer"] = $this->buyer1->name;
             break;
            case "visit_report": 
                $columns["agreement.date"] = $this->agreement_date . " " . $this->agreement_time;            
            break;  
            case "lease":
                $columns["lessor"] = "";
                if($this->lessor)
                    $columns["lessor"] = $this->lessor->name;
                $columns["first.lesseer"] = "";
                if($this->lessee1)
                    $columns["first.lesseer"] = $this->lessee1->name;
                
                $columns["second.lesseer"] = "";
                if($this->lessee2)
                    $columns["second.lesseer"] = $this->lessee2->name;
                
                $columns["third.lesseer"] = "";
                if($this->lessee3)
                    $columns["first.lesseer"] = $this->lessee3->name;

            break;
        }
        return $columns;
    }
 
    public function getContractHtml(){
            
            $product = $this->product;

            $parse["contract.house"] = $product->title;
            $parse["contract.house.province"] = $product->title;
            $parse["contract.house.town"] = $product->title;
            $parse["contract.house.street"] = $product->title;
            $parse["contract.house.street_number"] = $product->title;
            $parse["contract.house.get_floor_display"] = $product->title;
            $parse["contract.house.door"] = $product->title;
            $parse["contract.house.block"] = $product->title;
            $parse["contract.house.area"] = $product->title;
            $parse["contract.house.ref_number"] = $product->title;
            
            $parse["contract.agency.name"] = $product->title;
            $parse["contract.agency.address"] = $product->title;
            $parse["contract.agency.email"] = $product->title;

            
            $parse["contract.agreement_date.day"] = $product->title;
            $parse["contract.agreement_date.month"] = $product->title;
            $parse["contract.agreement_date.year"] = $product->title;

    }
}
