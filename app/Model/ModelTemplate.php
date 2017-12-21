<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Contract;

class ModelTemplate extends Model
{
    protected $table = 'model_templates';

    protected $guarded = array();

    public function templateType(){
         return $this->belongsTo('App\ModelTemplateType', 'model_type_id', 'id');
    }
    
    public function getFillContractAttribute(Contract $contract){
        
    }
}
