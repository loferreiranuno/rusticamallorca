<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactWishListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_wish_lists', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('product_id')->nullable();
            $table->unsignedInteger('contact_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->boolean('interested')->default(true); 
            $table->timestamps();
        });

         Schema::table('contact_wish_lists', function(Blueprint $table){

            $table->foreign('product_id')
            ->references('id')->on('products')
            ->onDelete('cascade');

            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');

            $table->foreign('contact_id')
            ->references('id')->on('contacts')
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
        Schema::dropIfExists('contact_wish_lists');
    }
}
