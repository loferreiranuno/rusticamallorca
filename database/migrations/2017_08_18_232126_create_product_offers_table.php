<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_offers', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('product_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('contact_id')->nullable();
            $table->string("operation");
            $table->decimal("value");

            $table->timestamps();
        });

         Schema::table('product_offers', function(Blueprint $table){

            $table->foreign('product_id')
            ->references('id')->on('products');
            $table->foreign('user_id')
            ->references('id')->on('users');
            $table->foreign('contact_id')
            ->references('id')->on('contacts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_offers');
    }
}
