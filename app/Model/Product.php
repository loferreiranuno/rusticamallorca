<?php

namespace App;

use Illuminate\Database\Eloquent\Model; 

class Product extends Model
{
    protected $table = 'products';
 
    protected $fillable = [
        'year',
        'building_expenses',         
    ];

    public function status(){
        return $this->belongsTo('App\ModelApp\ProductStatus', 'product_statues');
    }  
    
    public function address_access(){
        return $this->belongsTo('App\Model\PublicAccess');
    }
    public function features(){
        return $this->belongsToMany('App\Model\Feature', 'product_features');
    }
    
    public function images(){
        return $this->belongsToMany('App\Model\ProductImage', 'product_images',
        'id','product_id');
    }

    public function kind(){
        return $this->belongsTo('App\Model\ProductKindType', 'product_kinds');
    }

    public function creator(){
        return $this->belongsTo('App\Model\User', 'users', 
        'owner_id', 'id');
    }

    public function manager(){
        return $this->belongsTo('App\Model\User', 'users',
        'manager_id', 'id');
    }

    public function partner(){
        return $this->belongsTo('App\Model\Contact', 'contacts',
        'partner_id', 'id');
    }

    public function rentingPeriod(){
        return $this->belongsTo('App\Model\RentingPeriod', 'renting_periods');
    }

    public function energyCertificate(){
        return $this->belongsTo('App\Model\EnergyCertificate', 'energy_certificates');
    }

    public function divisionLicense(){
        return $this->belongsTo('App\Model\DivisionLicense', 'division_licenses');
    }

    public function electricPowerSystem(){
        return $this->belongsTo('App\Model\ElectricPowerSystem', 'electric_power_systems');
    }

    public function agreementType(){
        return $this->belongsTo('App\Model\AgreementType', ' agreement_types');
    }

    public function descriptions(){
        return $this->hasMany('App\Model\ProductDescription');
    }

}
