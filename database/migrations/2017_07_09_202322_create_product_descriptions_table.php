<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('product_descriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned()->index();
             
            $table->string('locale')->index();
            $table->text('description');
            
            $table->unique(['product_id', 'locale']);
        });

        Schema::table('product_descriptions', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_descriptions');
    }
}
