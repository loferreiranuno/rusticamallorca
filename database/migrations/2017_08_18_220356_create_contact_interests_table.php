<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactInterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::dropIfExists('contact_interests');
        Schema::create('contact_interests', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('contact_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();

            $table->integer("bedroom_min");
            $table->integer("bedroom_max");

            $table->integer("bathroom_min");
            $table->integer("bathroom_max");

            $table->integer("area_min");
            $table->integer("area_max");

            $table->boolean("sale_enabled");
            $table->decimal("sale_min");
            $table->decimal("sale_max");

            $table->boolean("rent_enabled");
            $table->decimal("rent_min");
            $table->decimal("rent_max");

            $table->integer("min_floor");

            $table->integer("area_window_min");
            $table->integer("area_window_max");
            
            $table->integer("celling_height_min");
            $table->integer("celling_height_max"); 

            $table->timestamps();
        });  
        
        Schema::table('contact_interests', function(Blueprint $table){

            $table->foreign('contact_id')
            ->references('id')->on('contacts');
            $table->foreign('user_id')
            ->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_interests');
    }
}
