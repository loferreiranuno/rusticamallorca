<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelTemplateType extends Model
{
    protected $table = 'model_template_types';

    public function templates(){
         return $this->hasMany('App\ModelTemplate', 'model_type_id');
    }

    public function getHasTemplatesAttribute(){
        return count($this->templates) > 0;
    }

    public function getTextAttribute(){
        return __('kinds.'.$this->code);
    } 

    public function getAvailableTypesAttribute(){
        
    }

    public function getAvailableColumnsAttribute(){
        if($this->code == "lease")
            return ["ID","Agreement Model", "Agreement date",	"Lessor", "First lessee", "Second lessee", "Third lessee"];
        elseif($this->code == "down_payment")
            return ["ID", "Agreement Model", "Agreement date", "First buyer", "Second buyer", "First owner", "Second owner"];
        elseif($this->code == "buyer_commission")
            return  ["ID", "Agreement Model", "Agreement date", "First buyer", "Second buyer"];
        elseif($this->code == "seller_commission")
            return ["ID", "Agreement Model", "Agreement date", "First seller", "Second seller"];
        elseif($this->code == "key_return")
           return ["ID", "Agreement Model", "Agreement date", "First seller"];
        elseif($this->code == "key_receive")
            return  ["ID", "Agreement Model", "Agreement date", "First seller"];
        elseif($this->code == "down_payment_receive")
            return ["ID", "Agreement Model", "Agreement date", "First buyer"];
        elseif($this->code == "visit_report")
            return ["ID", "Agreement Model", "Agreement date"];        
    }

    public function getAvailableKeysAttribute(){ 
        $keys = self::$codes["base"];

        $typeKeys = self::$codes[$this->code];

        return array_merge($keys, $typeKeys);
    }
    private static $codes = 
    [
        "base" => [
            'contract.house'
            ,'contract.house.province'
            ,'contract.house.town'
            ,'contract.house.street'
            ,'contract.house.street_number'
            ,'contract.house.get_floor_display'
            ,'contract.house.door'
            ,'contract.house.block'
            ,'contract.house.area'
            ,'contract.house.ref_number'
            ,'contract.agency.name'
            ,'contract.agency.address'
            ,'contract.agency.email'
            ,'contract.agreement_date.day'
            ,'contract.agreement_date.month'
            ,'contract.agreement_date.year'
        ],
        "down_payment" => [
            'contract.limit_date_title_land_granting.day'
            ,'contract.limit_date_title_land_granting.month'
            ,'contract.limit_date_title_land_granting.year'
            ,'contract.down_payment_amount'
            ,'contract.down_payment_amount_spelled_out'
            ,'contract.selling_amount'
            ,'contract.selling_amount_spelled_out'
            ,'contract.selling_amount_remaining'
            ,'contract.selling_amount_remaining_spelled_out'
            ,'contract.owner1.name'
            ,'contract.owner2.name'
            ,'contract.owner1.nif'
            ,'contract.owner2.nif'
            ,'contract.owner1.street'
            ,'contract.owner2.street'
            ,'contract.owner1.city'
            ,'contract.owner2.city'
            ,'contract.buyer1.name'
            ,'contract.buyer2.name'
            ,'contract.buyer1.nif'
            ,'contract.buyer2.nif'
            ,'contract.buyer1.street'
            ,'contract.buyer2.street'
            ,'contract.buyer1.city'
            ,'contract.buyer2.city'
        ],
        "key_receive" => [
            'contract.seller1.name'
            ,'contract.seller1.nif'
            ,'contract.seller1.street'
            ,'contract.seller1.city'
        ],
        "visit_report" => [
            'contract.visitor.name'
            ,'contract.visitor.phone'
            ,'contract.visitor.email'
            ,'contract.visitor.nif'
            ,'contract.commercial'
            ,'contract.agreement_time'            
        ],
        "key_return" => [
            'contract.seller1.name'
            ,'contract.seller1.nif'
            ,'contract.seller1.street'
            ,'contract.seller1.city'
        ],
        "down_payment_receive" => [
            'contract.down_payment_amount'
            ,'contract.buyer1.name'
            ,'contract.buyer1.nif'
            ,'contract.buyer1.street'
            ,'contract.buyer1.city'
        ],
        "seller_commission" => [
            'contract.commission_amount'
            ,'contract.seller1.name'
            ,'contract.seller2.name'
            ,'contract.seller1.nif'
            ,'contract.seller2.nif'
            ,'contract.seller1.street'
            ,'contract.seller2.street'
            ,'contract.seller1.city'
            ,'contract.seller2.city'
        ],
        "buyer_commission" => [
            'contract.commission_amount'
            ,'contract.buyer1.name'
            ,'contract.buyer2.name'
            ,'contract.buyer1.nif'
            ,'contract.buyer2.nif'
            ,'contract.buyer1.street'
            ,'contract.buyer2.street'
            ,'contract.buyer1.city'
            ,'contract.buyer2.city'
        ],
        "lease" => 
        [
            'contract.start_date.day'
            ,'contract.start_date.month'
            ,'contract.start_date.year'
            ,'contract.max_years_extend_time'
            ,'contract.max_days_warn_revoke'
            ,'contract.rent_amount_year'
            ,'contract.rent_amount_year_spelled_out'
            ,'contract.rent_amount_month'
            ,'contract.rent_amount_month_spelled_out'
            ,'contract.first_payment'
            ,'contract.first_payment_spelled_out'
            ,'contract.first_payment_month'
            ,'contract.first_payment_year'
            ,'contract.next_payment_date.day'
            ,'contract.next_payment_date.month'
            ,'contract.next_payment_date.year'
            ,'contract.bond'
            ,'contract.bond_spelled_out'
            ,'contract.deposit'
            ,'contract.deposit_text'
            ,'contract.current_water_meter'
            ,'contract.current_gas_meter'
            ,'contract.current_electricity_meter'
            ,'contract.lessor.name'
            ,'contract.lessor.nif'
            ,'contract.lessor.street'
            ,'contract.lessor.city'
            ,'contract.lessee_1.name'
            ,'contract.lessee_2.name'
            ,'contract.lessee_3.name'
            ,'contract.lessee_1.nif'
            ,'contract.lessee_2.nif'
            ,'contract.lessee_3.nif'
            ,'contract.lessee_1.street'
            ,'contract.lessee_2.street'
            ,'contract.lessee_3.street'
            ,'contract.lessee_1.city'
            ,'contract.lessee_2.city'
            ,'contract.lessee_3.city'
        ]
    ];


}
