<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskKindsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('task_kinds', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');            
        });
        
        DB::table('task_kinds')->insert(
            array(
                array('name'=>'Other'),
                array('name'=>'Phone call'),
                array('name'=>'Visit'),
                array('name'=>'Send email'),
                array('name'=>'Close sale'),
                array('name'=>'Close rent'),
                array('name'=>'Email interests campaign'),
                array('name'=>'Sign contract'),
                array('name'=>'Process request'),
                array('name'=>'Contact satisfied'),
                array('name'=>'Assessment'),
                array('name'=>'Proposal'),
                array('name'=>'Book Task'),
                array('name'=>'Acquirement')
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
        Schema::dropIfExists('task_kinds');
    }
}
