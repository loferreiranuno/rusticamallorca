<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelTemplateType extends Model
{
    protected $table = 'model_template_types';

    public function templates(){
         return $this->belongsToMany('App\ModelTemplate', 'model_type_id', 'model_templates');
    }

    public function getTextAttribute(){
        return __('kinds.'.$this->code);
    } 

    public function getAvailableTypesAttribute(){
        
    }

}
