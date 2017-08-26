<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id')->nullable();
            $table->string('file_name');
            $table->string('original_name');
            $table->timestamps();
        });
 
        Schema::table('product_documents', function(Blueprint $table){
            $table->foreign('product_id')->references('id')->on('products');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_documents');
    }
}
