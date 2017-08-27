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
            $table->unsignedInteger('product_kind_id')->nullable();

            $table->integer("bedroom_min")->default(0);
            $table->integer("bedroom_max")->default(0);

            $table->integer("bathroom_min")->default(0);
            $table->integer("bathroom_max")->default(0);

            $table->integer("area_min")->default(0);
            $table->integer("area_max")->default(0);

            $table->boolean("sale_enabled")->default(false);
            $table->decimal("sale_min")->default(0);
            $table->decimal("sale_max")->default(0);

            $table->boolean("rent_enabled")->default(false);
            $table->decimal("rent_min")->default(0);
            $table->decimal("rent_max")->default(0);

            $table->integer("min_floor");

            $table->integer("area_window_min");
            $table->integer("area_window_max");
            
            $table->integer("celling_height_min");
            $table->integer("celling_height_max"); 

            $table->timestamps();
        });  
        
        Schema::table('contact_interests', function(Blueprint $table){

            $table->foreign('contact_id')
            ->references('id')->on('contacts')
            ->onDelete('cascade');

            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');

            $table->foreign('product_kind_id')
            ->references('id')->on('product_kinds')
            ->onDelete('cascade');

            
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
