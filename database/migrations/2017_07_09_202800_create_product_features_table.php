<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('product_features', function (Blueprint $table) {         
            $table->integer('product_id')->unsigned()->index();
            $table->integer('feature_id')->unsigned()->index();
            $table->primary(['feature_id', 'product_id']);
        });

        Schema::table('product_features', function (Blueprint $table) {
            
            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('cascade');

            $table->foreign('feature_id')
                ->references('id')->on('features')
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
        Schema::dropIfExists('product_features');
    }
}
