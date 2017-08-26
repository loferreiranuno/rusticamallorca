<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id')->nullable();
            $table->unsignedInteger('image_type_id')->nullable();
            $table->string('file_name');
            $table->string('original_name');

            $table->timestamps();
        });

        Schema::table('product_images', function(Blueprint $table){

            $table->foreign('product_id')
            ->references('id')->on('products')->onDelete('cascade');
             $table->foreign('image_type_id')
            ->references('id')->on('product_image_types')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_images');
    }
}
