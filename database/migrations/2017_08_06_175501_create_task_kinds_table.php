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
                array('name'=>'Other', 'fa fa-tasks'),
                array('name'=>'Phone call', 'fa fa-phone'),
                array('name'=>'Visit', 'fa fa-eye'),
                array('name'=>'Send email', 'fa fa-envelope'),
                array('name'=>'Close sale', 'fa fa-money'),
                array('name'=>'Close rent', 'fa fa-money'),
                array('name'=>'Email interests campaign', 'fa fa-envelope'),
                array('name'=>'Sign contract', 'fa fa-pencil'),
                array('name'=>'Process request', 'fa fa-files-o'),
                array('name'=>'Contact satisfied', 'fa fa-check'),
                array('name'=>'Assessment', 'fa fa-search'),
                array('name'=>'Proposal', 'fa fa-briefcase'),
                array('name'=>'Book Task', 'fa fa-calendar'),
                array('name'=>'Acquirement', 'fa fa-tasks')
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
