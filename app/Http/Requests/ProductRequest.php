<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
         
        return [
            'city_name' => 'required',
            'zip_code' => 'required',
            'street_name' => 'required',
            'street_number' => 'required',

            'latitude'=> 'required',
            'longitude'=> 'required',

            'product_kind_id' => 'required',
            'area' => 'required',

            'identifier' => 'required'
        ];
    }
}
