<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $table = 'features';

    protected $fillable = [
        'name'
    ];

    public function products(){
        return $this->belongsToMany('App\Product', 'product_features');
    }

    public function scopeOrientationFeatures($query){
        $filter = [
            'east',
            'north',
            'west',
            'south',
            'golf views',
            'sea views',
            'mountain views'
        ];

        $query->whereIn('name', $filter);
        return $query->get();
    }

    public function scopeStatusFeature($query){
        $filter = [
            'new',
            'to reform',
            'new construction',
            'unfurnished',
            'furnished'
         ];

        $query->whereIn('name', $filter);
        return $query->get();
    }

    public function scopeBasicFeatures($query){
        
        $filter = [
            'air conditioner',
            'built-in wardrobes',
            'elevator',
            'outdoor',
            'garage',
            'garden',
            'community garden',
            'swimming pool',
            'communal swimming pool',
            'terrace',
            'storage room',
            'balcony'
        ];

        $query->whereIn('name', $filter);
        return $query->get();
    }
}
