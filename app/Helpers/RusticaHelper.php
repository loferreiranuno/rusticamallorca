<?php

namespace App\Helpers;

use App\Product;

class RusticaHelper{


    public static function getProductImage(Product $product, $fullSize){
        $images = $product->images;
        if($images == null || count($images) == 0)
            return 'img/product/house_no_pic.jpg';

        $size = $fullSize ? "full_" : "icon_"; 
        return 'img/product/'.$product->id.'/'.$size.$images->first()->file_name;
   
    } 
}