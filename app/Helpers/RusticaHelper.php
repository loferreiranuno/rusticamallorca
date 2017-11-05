<?php

namespace App\Helpers;

use App\Product;
use App\ProductImage;
use App\User;
use App\Language;
use App\Task;
use Carbon;

class RusticaHelper{
  
    public static function getTaskCss(Task $task){
        switch($task->currentStatus){
            case "expired": return "bg-danger"; break;
            case "done": return "bg-success"; break;
            case "now": return "bg-warning"; break;
            case "active": return "bg-primary"; break;
            default: return "gray-bg"; break;
        }
    }

    public static function getSaleType(){ 
        $result = [
            'all'=>  __('front/home.all'),
            'rent'=>  __('front/home.rent'),
            'sale'=>  __('front/home.sale')
        ]; 

        return $result;
    }

    public static function getRoomSelectItems($total = 8){        
        $result['-'] = __('include.rooms');
        for($i=1; $i<$total; $i++)
        {
            $result[$i] = __('include.nRooms',['total'=> $i]);    
        }  
        return $result;
    }

    public static function getProductDescription(Product $product, $languageCode){
        $language = Language::where('code','=',$languageCode)->first();
        return $product->getDescription($language->id);
    }
    
    public static function getProductKindInfo(Product $product){
        $info =  $product->kind->text;
        switch($product->kind->name){
            case "flat":
            case "villa":
            case "rooms":
            case "country house":
                $info .= ", ". __("include.nRooms",['total'=>$product->rooms]);
                $info .= ", ". __("include.nBathRooms",['total'=>$product->bathrooms]);
            break;
        }
        return $info;
    }
    public static function getProductImages(Product $product, $fullSize){
        $images = [];
        foreach($product->images as $image){
            $images[] = self::getImagePath($product, $image, $fullSize);
        }
        return json_encode($images);
    }

    public static function getProductImage(Product $product, $fullSize){
        $images = $product->images;
        if($images == null || count($images) == 0)
            return 'img/product/house_no_pic.jpg';

        return  RusticaHelper::getImagePath($product, $images->first(), $fullSize); 
   
    } 
    public static function getImagePath(Product $product, ProductImage $image, $fullSize){
        $size = $fullSize ? "full_" : "icon_"; 
        return asset('img/product/'.$product->id.'/'.$size.$image->file_name);
    }

    public static function getUserPicture(User $user){

        return asset('img/user/'.$user->id);
    }
 
    public static function getProductAddress(Product $product){
         switch($product->address_access->name){
             case "Hide all": return $product->city_name; break;
             case "Hide Street Number": return  $product->street_name . " " . $product->street_number . "," . $product->zip_code . " " . $product->city_name; break;
             case "Hide street": return $product->city_name; break;
             default:  return $product->full_address; break;
         }
    }

    public static function formatDate($date, $format){
        return Carbon\Carbon::createFromTimeStamp(strtotime($date))->format($format);
    }

    public static function isChecked(array $request, $name, $value){
        
        if(!isset($request[$name])){
            return false;
        }
        
        return in_array($value, $request[$name]);
        
    }
  
    
}