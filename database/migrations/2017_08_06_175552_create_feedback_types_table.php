<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {       

        Schema::create("feedback_types", function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
        });

        DB::table('feedback_types')->insert(
            array(
                array('name'=>'Dislike state'),
                array('name'=>'High building expenses'),
                array('name'=>'Small elevator'),
                array('name'=>'Needs reform'),
                array('name'=>'Low lighting'),
                array('name'=>'Dislike distribution'),
                array('name'=>'Dislike house entrance'),
                array('name'=>'Dislike patio light'),
                array('name'=>'Low ceiling'),
                array('name'=>'Small kitchen'),
                array('name'=>'Small bedrooms'),
                array('name'=>'Small livingroom'),
                array('name'=>'Blind room'),
                array('name'=>'Hallway room'),
                array('name'=>'Too many stairs'),
                array('name'=>'Architectural barriers')
            )
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {        
        Schema::dropIfExists('feedback_types');
    }
}
