<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
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
        return $this->hasOne('App\Product', 'id', 'second_lessee');
    }
    public function lessee3(){        
        return $this->hasOne('App\Product', 'id', 'third_lessee');
    } 
    
}
