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
        $rules['agreement_time'] = "required";
        $rules['template_id'] = "required";        
        $rules['visitor_id'] = "sometimes|required";
        $rules['comercial_id'] = "sometimes|required";
        
        return $rules;
    }
}
