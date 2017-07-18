<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductKindTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_kinds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        DB::table('product_kinds')->insert(array(
            array('name' => 'flat')
            ,array('name' => 'villa')
            ,array('name' => 'country house')
            ,array('name' => 'bungalow')
            ,array('name' => 'room')
            ,array('name' => 'parking')
            ,array('name' => 'shop')
            ,array('name' => 'industrial')
            ,array('name' => 'office')
            ,array('name' => 'land')
            ,array('name' => 'storage')
            ,array('name' => 'building')
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_kinds');
    }
}
