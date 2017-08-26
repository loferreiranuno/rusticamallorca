<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDocument extends Model
{
    public function product(){
        return $this->hasOne('App\Product', 'id', 'product_id');
    } 

    public static $rules = [
        'file' => 'required|mimes:pdf,doc,xlsx,docx,txt,xml,csv,png,jpeg,jpg,mp4,wmv,zip,rar'
    ];
    
    public static $messages = [
        'file.mimes' => 'Uploaded file is not in image format',
        'file.required' => 'Image is required'
    ];
}
