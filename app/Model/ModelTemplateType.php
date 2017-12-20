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
}
