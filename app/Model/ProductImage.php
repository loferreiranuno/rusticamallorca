<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{ 

    protected $table = 'product_images';

    public function product(){
        return $this->hasOne('App\Product', 'id', 'product_id');
    } 

    public function type(){
        return $this->hasOne('App\ProductImageType', 'id', 'image_type_id');
    }

    public static $rules = [
        'file' => 'required|mimes:png,gif,jpeg,jpg,bmp'
    ];
    
    public static $messages = [
        'file.mimes' => 'Uploaded file is not in image format',
        'file.required' => 'Image is required'
    ];
     
}
