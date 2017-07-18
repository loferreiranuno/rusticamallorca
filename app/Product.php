<?php

namespace App;

use Illuminate\Database\Eloquent\Model; 

class Product extends Model
{
    protected $table = 'products';
 
    protected $fillable = [
         'creator_id',
         'recruiter_id',
         'manager_id',
         'owner_id',
         'partner_id',
         'product_status_id',
         'product_kind_id',
         'renting_period_id',
         'energy_certificate_id',
         'division_license_id',
         'electric_power_system_id',
         'agreement_type_id',
         'city_name',
         'zip_code',
         'street_name',
         'street_number',
         'latitude',
         'longitude',
         'district',
         'zone',
         'urbanization',
         'block',
         'doorway',
         'door',
         'identifier',
         'floors',
         'rooms',
         'bathrooms',
         'area',
         'area_util',
         'area_underground',
         'area_first_floor',
         'window_area',
         'ceiling_height',
         'year',
         'building_expenses',
         'building_floors',
         'building_floors_expand',
         'building_front',
         'building_depth',
         'plot_area',
         'renting_enabled',
         'renting_cost',
         'renting_agency_fee',
         'renting_bond',
         'renting_deposit',
         'vacation_enabled',
         'vacation_register_number',
         'selling_enabled',
         'selling_cost_visible',
         'selling_cost',
         'video_url',
         'virtual_visit_url',
         'external_url',
         'register_number',
         'keys',
         'internal_notes',
         'simple_note_enabled',
         'simple_note_date',
         'mortage_enabled',
         'mortage_cost',
         'land_value_tax',
         'agreement_valid_until',
         'agreement_commission_percentage',
         'agreement_commission_amount',
         'title',
         'area_in_registry',
         'terrace_area',
         'garage_area',
         'magazine_description'     
    ];

    public function status(){
        return $this->belongsTo('App\ProductStatus', 'product_statues');
    }  
    
    public function address_access(){
        return $this->belongsTo('App\PublicAccess');
    }
    public function features(){
        return $this->belongsToMany('App\Feature', 'product_features');
    }
    
    public function images(){
        return $this->belongsToMany('App\ProductImage', 'product_images',
        'id','product_id');
    }

    public function kind(){
        return $this->belongsTo('App\ProductKindType', 'product_kinds');
    }

    public function creator(){
        return $this->belongsTo('App\User', 'users', 
        'owner_id', 'id');
    }

    public function manager(){
        return $this->belongsTo('App\User', 'users',
        'manager_id', 'id');
    }

    public function partner(){
        return $this->belongsTo('App\Contact', 'contacts',
        'partner_id', 'id');
    }

    public function rentingPeriod(){
        return $this->belongsTo('App\RentingPeriod', 'renting_periods');
    }

    public function energyCertificate(){
        return $this->belongsTo('App\EnergyCertificate', 'energy_certificates');
    }

    public function divisionLicense(){
        return $this->belongsTo('App\DivisionLicense', 'division_licenses');
    }

    public function electricPowerSystem(){
        return $this->belongsTo('App\ElectricPowerSystem', 'electric_power_systems');
    }

    public function agreementType(){
        return $this->belongsTo('App\AgreementType', ' agreement_types');
    }

    public function descriptions(){
        return $this->hasMany('App\ProductDescription');
    }

}
