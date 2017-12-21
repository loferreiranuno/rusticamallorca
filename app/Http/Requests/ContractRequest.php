<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];
        
        $rules['agreement_date'] = "required";
        $rules['agreement_time'] = "sometimes|required";
        $rules['template_id'] = "required";        
        $rules['visitor_id'] = "sometimes|required";
        $rules['comercial_id'] = "sometimes|required";
 
        $rules['initial_renting_date'] = "sometimes|required";
        $rules['max_years_extend_time'] = "sometimes|required";
        $rules['max_days_warn_revoke'] = "sometimes|required";
        $rules['rent_amount_year'] = "sometimes|required";
        $rules['rent_amount_month'] = "sometimes|required";
        $rules['first_payment'] = "sometimes|required";
        $rules['first_payment_month'] = "sometimes|required";
        $rules['first_payment_year'] = "sometimes|required";
        $rules['next_payment_date'] = "sometimes|required";
        $rules['bond'] = "sometimes|required";
        $rules['deposit'] = "sometimes|required";         
  
        $rules['first_owner_id'] = "sometimes|required";
        $rules['first_buyer_id'] = "sometimes|required";
        $rules['initial_renting_date'] = "sometimes|required";
        $rules['down_payment_amount'] = "sometimes|required";
        $rules['down_payment_amount_spelled'] = "sometimes|required";
        $rules['full_selling_amount'] = "sometimes|required";
        $rules['full_selling_amount_spelled'] = "sometimes|required";
        $rules['remaining_selling_amount'] = "sometimes|required";
        $rules['remaining_selling_amount_spelled'] = "sometimes|required";
    
        $rules['first_seller_id'] = "sometimes|required";
        $rules['selling_commission_amount'] = "sometimes|required";
        $rules['commission_amount'] = "sometimes|required";

        return $rules;
    }
}
