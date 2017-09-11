<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('features', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); 
        });
 
        DB::table('features')->insert(
            array(
             array('name' => 'disabled access')
            ,array('name' => 'attached')
            ,array('name' => 'new')
            ,array('name' => 'air conditioner') //
            ,array('name' => 'alarm')
            ,array('name' => 'warehouse')
            ,array('name' => 'luxury')
            ,array('name' => 'furnished')
            ,array('name' => 'pets')
            ,array('name' => 'TV antenna')
            ,array('name' => 'apartment')
            ,array('name' => 'to reform')
            ,array('name' => 'built-in wardrobes')
            ,array('name' => 'elevator')
            ,array('name' => 'half bathroom')
            ,array('name' => 'penthouse')
            ,array('name' => 'rooftop terrace')
            ,array('name' => 'balcony')
            ,array('name' => 'barbecue')
            ,array('name' => 'pantry')
            ,array('name' => 'bohemian')
            ,array('name' => 'bungalow')
            ,array('name' => 'central heating')
            ,array('name' => 'electric heating')
            ,array('name' => 'heating oil')
            ,array('name' => 'individual heating')
            ,array('name' => 'security cameras')
            ,array('name' => 'low house')
            ,array('name' => 'townhouse')
            ,array('name' => 'downtown')
            ,array('name' => 'chimney')
            ,array('name' => 'open kitchen')
            ,array('name' => 'furnished kitchen')
            ,array('name' => 'equipped kitchen')
            ,array('name' => 'caretaker')
            ,array('name' => 'smoke detector')
            ,array('name' => 'diaphanous')
            ,array('name' => 'service bedroom')
            ,array('name' => 'duplex')
            ,array('name' => 'buildable')
            ,array('name' => 'emblematic building')
            ,array('name' => 'protected building')
            ,array('name' => 'access from street')
            ,array('name' => 'stairs')
            ,array('name' => 'corner')
            ,array('name' => 'concrete structure')
            ,array('name' => 'wooden structure')
            ,array('name' => 'metallic structure')
            ,array('name' => 'studio')
            ,array('name' => 'outdoor')
            ,array('name' => 'extinguisher')
            ,array('name' => 'smoke extractor')
            ,array('name' => 'country estate')
            ,array('name' => 'garage')
            ,array('name' => 'butane gas')
            ,array('name' => 'natural gas')
            ,array('name' => 'gym')
            ,array('name' => 'historic')
            ,array('name' => 'hotel')
            ,array('name' => 'villa')
            ,array('name' => 'interior')
            ,array('name' => 'internet') //
            ,array('name' => 'garden')
            ,array('name' => 'community garden')
            ,array('name' => 'laundry')
            ,array('name' => 'dishwasher')
            ,array('name' => 'loft')
            ,array('name' => 'bright')
            ,array('name' => 'trunk')
            ,array('name' => 'mansion')
            ,array('name' => 'farmhouse')
            ,array('name' => 'hoist')
            ,array('name' => 'unfurnished')
            ,array('name' => 'new construction')
            ,array('name' => 'east')
            ,array('name' => 'north')
            ,array('name' => 'west')
            ,array('name' => 'south')
            ,array('name' => 'semidetached')
            ,array('name' => 'parking')
            ,array('name' => 'lightwell')
            ,array('name' => 'large lightwell')
            ,array('name' => 'patio')
            ,array('name' => 'inner courtyard')
            ,array('name' => 'stippled walls')
            ,array('name' => 'smooth walls')
            ,array('name' => 'swimming pool')
            ,array('name' => 'communal swimming pool')
            ,array('name' => 'paddle tennis court')
            ,array('name' => 'squash court')
            ,array('name' => 'tennis court')
            ,array('name' => 'garage included')
            ,array('name' => 'porch')
            ,array('name' => 'doorman')
            ,array('name' => 'automated doors')
            ,array('name' => 'reinforced door')
            ,array('name' => 'security door')
            ,array('name' => 'reformed')
            ,array('name' => 'emergency exit')
            ,array('name' => 'vent')
            ,array('name' => 'sauna')
            ,array('name' => 'insurance')
            ,array('name' => 'singular')
            ,array('name' => 'plot')
            ,array('name' => 'solarium')
            ,array('name' => 'sunny')
            ,array('name' => 'basement')
            ,array('name' => 'floor tiles')
            ,array('name' => 'marble floor')
            ,array('name' => 'parquet floor')
            ,array('name' => 'radiating floor')
            ,array('name' => 'floating floor')
            ,array('name' => 'raised floor')
            ,array('name' => 'terrazzo floor')
            ,array('name' => 'false ceiling')
            ,array('name' => 'clothes line')
            ,array('name' => 'terrace')
            ,array('name' => 'transfer')
            ,array('name' => 'storage room')
            ,array('name' => 'storage room included')
            ,array('name' => 'triplex')
            ,array('name' => 'tourist')
            ,array('name' => 'private urbanization')
            ,array('name' => 'permanent ford')
            ,array('name' => 'aluminum windows')
            ,array('name' => 'double glazing')
            ,array('name' => 'wooden windows')
            ,array('name' => 'video intercom')
            ,array('name' => 'security 24h')
            ,array('name' => 'golf views')
            ,array('name' => 'sea views')
            ,array('name' => 'mountain views')
            ,array('name' => 'wifi')
            ,array('name' => 'playground')
            ,array('name' => 'green area')));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('features');
    }
}
