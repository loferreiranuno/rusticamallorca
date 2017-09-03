<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImageTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        // Schema::dropIfExists('product_image_types');
        Schema::create('product_image_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        DB::table('product_image_types')->insert(
            array(
                array('name'=> 'unknown') , 
                array('name'=> 'bathroom') ,
                  array('name'=> 'kitchen') , 
                array('name'=> 'details') , 
                 array('name'=> 'bedroom') , 
                 array('name'=> 'facade') , 
                  array('name'=> 'garage') , 
                  array('name'=> 'garden') , 
                   array('name'=> 'blueprints') ,
                    array('name'=> 'living_room') , 
                     array('name'=> 'terrace') ,
                      array('name'=> 'views') ,  
                      array('name'=> 'pool') , 
                       array('name'=> 'mates') , 
                        array('name'=> 'hallway') , 
                        array('name'=> 'hall') , 
                         array('name'=> 'waiting_room') , 
                         array('name'=> 'common_areas') , 
                          array('name'=> 'reception') ,  
                         array('name'=> 'attic') , 
                          array('name'=> 'archive') , 
                          array('name'=> 'warehouse') , 
                           array('name'=> 'room') , 
                           array('name'=> 'entry_exit') , 
                            array('name'=> 'land') , 
                            array('name'=> 'dining_room') , 
                             array('name'=> 'patio') , 
                             array('name'=> 'laundry_room') , 
                              array('name'=> 'rooftop_terrace') ,
                               array('name'=> 'half_bathroom') , 
                                array('name'=> 'basement') 
            ));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_image_types');
    }
}
