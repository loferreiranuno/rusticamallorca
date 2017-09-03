<?php

namespace App;

use Illuminate\Database\Eloquent\Model; 
use Illuminate\Http\Request;

use App\ContactInterest;

class Product extends Model
{
    protected $table = 'products';
 
    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }

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
        'public_access_id',
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
        return $this->hasOne('App\ProductStatus', 'id', 'product_status_id');
    }  
    
    public function address_access(){
        return $this->belongsTo('App\PublicAccess');
    }
    public function features(){
        return $this->belongsToMany('App\Feature', 'product_features');
    }
     
    public function images(){
        return $this->hasMany('App\ProductImage');
    }

    public function kind(){
        return $this->hasOne('App\ProductKindType', 'id', 'product_kind_id');
    } 

    public function owner(){
        return $this->hasOne('App\Contact', 'id', 'owner_id');
    }

    public function creator(){
        return $this->hasOne('App\User', 'id', 'creator_id');
    }

    public function recruiter(){
        return $this->hasOne('App\User', 'id', 'recruiter_id');
    }

    public function seller(){
        return $this->hasOne('App\User', 'id', 'manager_id');
    }

    public function partner(){
        return $this->hasOne('App\Contact', 'id', 'partner_id');
    }

    public function rentingPeriod(){
        return $this->hasOne('App\RentingPeriod', 'id', 'renting_period_id');
    }

    public function energyCertificate(){
        return $this->hasOne('App\EnergyCertificate', 'id', 'energy_certificate_id');
    }

    public function divisionLicense(){
        return $this->hasOne('App\DivisionLicense', 'division_licenses');
    }

    public function electricPowerSystem(){
        return $this->hasOne('App\ElectricPowerSystem', 'electric_power_systems');
    }

    public function agreementType(){
        return $this->hasOne('App\AgreementType', 'id', 'agreement_type_id');
    }
    
    public function documents(){
        return $this->hasMany('App\ProductDocument');
    }

    public function descriptions(){
        return $this->hasMany('App\ProductDescription');
    }

    public function englishDescription(string $code){
        return $this->descriptions();
    }
    
    public function offers(){
        return $this->hasMany("App\ProductOffer");
    }
  
    public function getDescription($languageId = null)
    { 
        $data = $this
            ->hasOne('App\ProductDescription')
            ->where('language_id', '=', $languageId)
            ->first();
        
        if(!isset($data)){
            return "";
        }           

        return $data->description;
    }

    public function wishList(){
        return $this->hasMany('App\ContactWishList');
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

    public function getFullAddressAttribute()
    {
        return
            $this->street_name 
            . " " . $this->street_number 
            . " " . $this->block
            . " " . $this->doorway
            . "," . $this->zip_code 
            . " " . $this->city_name;
    }
 
    public function tasks(){
        return $this->hasMany('App\Task')->orderBy('start_date');
    }
    
    public function scopeFilterByInterest($query, ContactInterest $interest){

        if($interest->rent_enabled){
            $query->where('renting_enabled', '=', 1);
            if($interest->rent_min > 0 && $interest->rent_max > 0){
                $query
                    ->where('renting_cost','>=', $interest->rent_min)
                    ->where('renting_cost','<=', $interest->rent_max);

            }
        }

        if($interest->sale_enabled){
            $query->where('selling_enabled', '=', 1);
            if($interest->sale_min > 0 && $interest->sale_max > 0){
                    $query
                    ->where('selling_cost','>=', $interest->sale_min)
                    ->where('selling_cost','<=', $interest->sale_max);
            }
        }

        if($interest->bathroom_min > 0 && $this->bathroom_max > 0){
            $query
                ->where('bathrooms','>=', $interest->bathroom_min)
                ->where('bathrooms','<=', $interest->bathroom_max);
        }
        if($interest->bedroom_max > 0 && $this->bedroom_max > 0){
            $query
                ->where('bedroom_max','>=', $interest->bedroom_max)
                ->where('bedroom_max','<=', $interest->bedroom_max);
        }

        if($interest->area_min > 0 && $interest->area_max > 0){
            $query
                ->where('area','>=', $interest->area_min)
                ->where('area','<=', $interest->area_max);
        }

        if(isset($interest->kind)){
            $query
                ->where('product_kind_id','=', $interest->kind->id);
        }

        return $query;

    }
    //BACKOFFICE PRODUCT SEARCH;
    public function scopeSearch($query, Request $request){
 
        if($request->has('typology')){
            $query->where('product_kind_id', '=', $request->get('typology'));
        }

        if($request->has('status')){
            $query->where('product_status_id', '=', $request->get('status'));
        }

        if($request->has('sell_type')){
            switch($request->get('sell_type')){
                case "rent": $query->where('renting_enabled', '=', 1 ); break;
                case "sell": $query->where('selling_enabled', '=', 1 ); break;
            }
        }

        if($request->has('max_price')){
            switch($request->get('sell_type'))
            {
                case "rent": 
                    $query
                        ->where('renting_cost', '<=', $request)
                        ->get('max_price'); break;
                case "sell": 
                    $query->where('selling_cost', '<=', $request->get('max_price')); break;
                default: 
                    $query
                        ->where(function($q) use($request){
                            $q->where('renting_cost', '<=', $request->get('max_price'))
                            ->orWhere('renting_cost', 'is', 'NULL');
                        })
                        ->where(function($q)  use($request){
                            $q
                            ->where('selling_cost', '<=', $request->get('max_price'))
                            ->orWhere('selling_cost', 'is', 'NULL');
                        });
                break;
            }
        }

        if($request->has('min_area')){
           $query->where('area', '>=', $request->get('min_area'));
        } 
        return $query;
    }
  
}
