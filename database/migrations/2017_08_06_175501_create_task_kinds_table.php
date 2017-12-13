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
        Schema::dropIfExists('task_kinds');
        Schema::create('task_kinds', function(Blueprint $table){
            $table->increments('id');
            $table->string('name'); 
            $table->string('css_icon');           
        }); 

        DB::table('task_kinds')->insert(
            array(
                array('name'=>'Other', 'css_icon'=> 'fa fa-tasks'),
                array('name'=>'Phone call', 'css_icon'=>'fa fa-phone'),
                array('name'=>'Visit', 'css_icon'=>'fa fa-eye'),
                array('name'=>'Send email','css_icon'=> 'fa fa-envelope'),
                array('name'=>'Close sale','css_icon'=> 'fa fa-money'),
                array('name'=>'Close rent','css_icon'=> 'fa fa-money'),
                array('name'=>'Email interests campaign','css_icon'=> 'fa fa-envelope'),
                array('name'=>'Sign contract','css_icon'=> 'fa fa-pencil'),
                array('name'=>'Process request','css_icon'=> 'fa fa-files-o'),
                array('name'=>'Contact satisfied', 'css_icon'=>'fa fa-check'),
                array('name'=>'Assessment','css_icon'=> 'fa fa-search'),
                array('name'=>'Proposal','css_icon'=> 'fa fa-briefcase'),
                array('name'=>'Book Task', 'css_icon'=>'fa fa-calendar'),
                array('name'=>'Acquirement', 'css_icon'=>'fa fa-tasks')
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
