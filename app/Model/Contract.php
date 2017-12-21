<?php

namespace App;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
    
    public function getContractHtmlAttribute(){
            
            $product = $this->product;
            $parse["contract.house"] = $product->title;
            $parse["contract.house.province"] = $product->province_name;
            $parse["contract.house.town"] = $product->city_name;
            $parse["contract.house.street"] = $product->street_name;
            $parse["contract.house.street_number"] = $product->street_number;
            $parse["contract.house.get_floor_display"] = $product->dooway;
            $parse["contract.house.door"] = $product->door;
            $parse["contract.house.block"] = $product->block;
            $parse["contract.house.area"] = $product->area;
            $parse["contract.house.ref_number"] = $product->identifier;
            $parse["contract.agency.name"] = Config::get('app.companyName');
            $parse["contract.agency.address"] = Config::get('app.companyAddress');
            $parse["contract.agency.email"] = Config::get('app.companyPhone');
            
            $agreementDate = Carbon::parse($this->agreement_date);
            $parse["contract.agreement_date.day"] = $agreementDate->format("D");
            $parse["contract.agreement_date.month"] = $agreementDate->format("F");
            $parse["contract.agreement_date.year"] = $agreementDate->format("Y");

            if(isset($this->initial_renting_date)){
                $startDate = Carbon::parse($this->initial_renting_date);
                $parse["contract.start_date.day"] = $startDate->format("D");//"Fecha de inicio del alquiler (día)",
                $parse["contract.start_date.month"] = $startDate->format("F");//"Fecha de inicio del alquiler (mes)",
                $parse["contract.start_date.year"] = $startDate->format("Y");//"Fecha de inicio del alquiler (año)",
            }

            $parse["contract.max_years_extend_time"] = $this->max_years_extend_time;//"Número de años que se puede extender el contrato",
            $parse["contract.max_days_warn_revoke"] = $this->max_days_warn_revoke;//"Días para avisar de la revocación del contrato",
            $parse["contract.rent_amount_year"] = $this->rent_amount_year;//"Valor del alquiler por año - Número",
            $parse["contract.rent_amount_year_spelled_out"] = $this->rent_amount_year_spelled;//"Valor del alquiler por año - Letra",
            $parse["contract.rent_amount_month"] = $this->rent_amount_month;//"Valor del alquiler por mes - Número",
            $parse["contract.rent_amount_month_spelled_out"] = $this->rent_amount_month_spelled;//"Valor del alquiler por mes - Letra",
            $parse["contract.first_payment"] = $this->first_payment;//"Valor del pago inicial - Número",
            $parse["contract.first_payment_spelled_out"] = $this->first_payment_spelled;//"Valor del pago inicial - Letra",
            $parse["contract.first_payment_month"] = $this->first_payment_month;//"Valor del primer pago mensual - Número",
            $parse["contract.first_payment_year"] = $this->first_payment_year;//"Valor del orimer pago anual - Número",
            
            if(isset($this->next_payment_date)){
                $nextPaymentDate = Carbon::parse($this->next_payment_date);
                $parse["contract.next_payment_date.day"] = $nextPaymentDate->format("D");//"Fecha del próximo pago (día)",
                $parse["contract.next_payment_date.month"] = $nextPaymentDate->format("F");//"Fecha del próximo pago (mes) ",
                $parse["contract.next_payment_date.year"] = $nextPaymentDate->format("Y");//"Fecha del próximo pago (año) ",
            }

            $parse["contract.bond"] = $this->bond;//"Valor de la fianza - Número",
            $parse["contract.bond_spelled_out"] = $this->bond_spelled;//"Valor de la fianza - Letra",
            $parse["contract.deposit"] = $this->deposit;//"Valor del aval - Número",
            $parse["contract.deposit_text"] = $this->deposit_spelled;//"Valor del aval - Letra",
            $parse["contract.current_water_meter"] = $this->current_water_meter . "m&sup3;";//"Estado del contador de agua",
            $parse["contract.current_gas_meter"] = $this->current_gas_meter . "m&sup3;";//"Estado del contador de gas",
            $parse["contract.current_electricity_meter"] = $this->current_electricity_meter. "kWh";//"Estado del contador de electricidad",
            
            if(isset($this->lessor)){
                $parse["contract.lessor.name"] = $this->lessor->name;//"Arrendador - Nombre",
                $parse["contract.lessor.nif"] = $this->lessor->nif;//"Arrendador - NIF",
                $parse["contract.lessor.street"] = $this->lessor->address;//"Arrendador - Calle",
                $parse["contract.lessor.city"] = $this->lessor->city;//"Arrendador - Población",
            }

            if(isset($this->lessee3)){

                $parse["contract.lessee_3.name"] = $this->lessee3->name;//"Arrendatario 3 - Nombre",
                $parse["contract.lessee_3.nif"] = $this->lessee3->nif;//"Arrendatario 3 - NIF",
                $parse["contract.lessee_3.street"] = $this->lessee3->address;//"Arrendatario 3 - Calle",
                $parse["contract.lessee_3.city"] = $this->lessee3->city;//"Arrendatario 3 - Población",
            
            }
            
            if(isset($this->lessee2)){

                $parse["contract.lessee_2.name"] = $this->lessee2->name;//"Arrendatario 2 - Nombre",
                $parse["contract.lessee_2.nif"] = $this->lessee2->nif;//"Arrendatario 2 - NIF",
                $parse["contract.lessee_2.street"] = $this->lessee2->address;//"Arrendatario 2 - Calle",
                $parse["contract.lessee_2.city"] = $this->lessee2->city;//"Arrendatario 2 - Población",
            
            }
            
            if(isset($this->lessee1)){

                $parse["contract.lessee_1.name"] = $this->lessee1->name;//"Arrendatario 1 - Nombre",
                $parse["contract.lessee_1.nif"] = $this->lessee1->nif;//"Arrendatario 1 - NIF",
                $parse["contract.lessee_1.street"] = $this->lessee1->address;//"Arrendatario 1 - Calle",
                $parse["contract.lessee_1.city"] = $this->lessee1->city;//"Arrendatario 1 - Población",
            
            }
            
            if(isset($this->limit_date_title_land_granting)){
                $date = Carbon::parse($this->next_payment_date);
                $parse["contract.limit_date_title_land_granting.day"] = $date->format("D");//"Fecha tope del otorgamiento de la escritura pública de compraventa (día)",
                $parse["contract.limit_date_title_land_granting.month"] = $date->format("F");//"Fecha tope del otorgamiento de la escritura pública de compraventa (mes)",
                $parse["contract.limit_date_title_land_granting.year"] = $date->format("Y");//"Fecha tope del otorgamiento de la escritura pública de compraventa (año)",
            }

            $parse["contract.down_payment_amount"] = $this->down_payment_amount;//"Valor de arras - Número",
            $parse["contract.down_payment_amount_spelled_out"] = $this->down_payment_amount_spelled;//"Valor de arras - Letra",
            $parse["contract.selling_amount"] = $this->full_selling_amount;//"Valor de compraventa - Número",
            $parse["contract.selling_amount_spelled_out"] = $this->full_selling_amount_spelled;//"Valor de compraventa - Letra",
            $parse["contract.selling_amount_remaining"] = $this->remaining_selling_amount;// "Valor de compraventa restante - Número",
            $parse["contract.selling_amount_remaining_spelled_out"] = $this->remaining_selling_amount_spelled;// "Valor de compraventa restante - Letra",
            
            if(isset($this->owner1)){
                $parse["contract.owner1.name"] = $this->owner1->name;//"Propietario 1 - Nombre",
                $parse["contract.owner1.nif"] = $this->owner1->nif;//"Propietario 1 - NIF",
                $parse["contract.owner1.street"] = $this->owner1->address;//"Propietario 1 - Calle",
                $parse["contract.owner1.city"] = $this->owner1->city;//"Propietario 1 - Población",
            }

            if(isset($this->owner2)){
                $parse["contract.owner2.city"] = $this->owner2->city;//"Propietario 2 - Población",
                $parse["contract.owner2.street"] =  $this->owner2->address;//"Propietario 2 - Calle",
                $parse["contract.owner2.nif"] =  $this->owner2->nif;//"Propietario 2 - NIF",
                $parse["contract.owner2.name"] = $this->owner2->name;//"Propietario 2 - Nombre",
            }

            if(isset($this->buyer1)){
                $parse["contract.buyer1.name"] = $this->buyer1->name;//"Comprador 1 - Nombre",
                $parse["contract.buyer1.nif"] = $this->buyer1->nif;//"Comprador 1 - NIF",
                $parse["contract.buyer1.street"] = $this->buyer1->address;//"Comprador 1 - Calle",
                $parse["contract.buyer1.city"] = $this->buyer1->city;//"Comprador 1 - Población",
            }

            if(isset($this->buyer2))
            {
                $parse["contract.buyer2.city"] = $this->buyer2->city;//"Comprador 2 - Población"
                $parse["contract.buyer2.street"] = $this->buyer2->address;//"Comprador 2 - Calle",
                $parse["contract.buyer2.nif"] = $this->buyer2->nif;//"Comprador 2 - NIF",
                $parse["contract.buyer2.name"] = $this->buyer2->name;//"Comprador 2 - Nombre",
            }

            $parse["contract.commission_amount"] = $this->commission_amount; //"Valor de comisión - Número",
            
            if(isset($this->seller1)){
                $parse["contract.seller1.name"] = $this->seller1->name; //"Vendedor 1 - Nombre",
                $parse["contract.seller1.nif"] = $this->seller1->nif; // "Vendedor 1 - NIF",
                $parse["contract.seller1.street"] = $this->seller1->address; //=> "Vendedor 1 - Calle",
                $parse["contract.seller1.city"] = $this->seller1->city; //=> "Vendedor 1 - Población",
            }

            if(isset($this->seller2)){
                $parse["contract.seller2.city"] = $this->seller2->city; //=> "Vendedor 2 - Población",
                $parse["contract.seller2.street"] = $this->seller2->address; //=> "Vendedor 2 - Calle",
                $parse["contract.seller2.nif"] = $this->seller2->nif; // "Vendedor 2 - NIF",
                $parse["contract.seller2.name"] = $this->seller2->name; //"Vendedor 2 - Nombre",
            }

            if(isset($this->visitor)){
                $parse["contract.visitor.name"] = $this->visitor->name; // => "Visitante - nombre",
                $parse["contract.visitor.phone"] = $this->visitor->phone; // => "Visitante - teléfono",
                $parse["contract.visitor.email"] = $this->visitor->email; // => "Visitante - email",
                $parse["contract.visitor.nif"] = $this->visitor->nif; // => "Visitante - NIF",
            }

            if(isset($this->comercial)){
                $parse["contract.commercial"] = $this->comercial->name; // => "Comercial - nombre",
            }
            
            $parse["contract.agreement_time"] = $this->agreement_time; // => "Fecha contrato (hora:minutos)");

            $templateHtml = $this->template->text;
            foreach($parse as $key => $value){
                if(isset($value)){
                    $templateHtml = str_replace("#".$key."#",$value, $templateHtml);
                }
            }

            return $templateHtml;
    }
}
