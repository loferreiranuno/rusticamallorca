<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('creator_id')->unsigned();

            $table->integer('responsable_id')->nullable()->unsigned();

            $table->integer('partner_id')->nullable()->unsigned();
            $table->integer('kind_id')->nullable()->unsigned();  
            $table->integer('step_id')->nullable()->unsigned();
            $table->integer('lang_id')->nullable()->unsigned();           
            $table->integer('source_id')->nullable()->unsigned();

            $table->string('name');          
            $table->string('email')->unique();

            $table->string('alias')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_alt')->nullable();
            $table->string('nif')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->text('note')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
        
        Schema::table('contacts', function(Blueprint $table){
        
            $table->foreign('creator_id')->references('id')->on('users');
            $table->foreign('responsable_id')->references('id')->on('users');
            $table->foreign('partner_id')->references('id')->on('contacts');
            $table->foreign('kind_id')->references('id')->on('contact_kinds');  
            $table->foreign('step_id')->references('id')->on('contact_steps');
            $table->foreign('lang_id')->references('id')->on('languages');           
            $table->foreign('source_id')->references('id')->on('contact_sources');
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
