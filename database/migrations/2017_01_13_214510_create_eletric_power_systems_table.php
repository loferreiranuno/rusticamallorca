<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEletricPowerSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('electric_power_systems');
        Schema::create('electric_power_systems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); 
        });
        
        // Single Phase, Two Phase, Three Phase;
        DB::table('electric_power_systems')->insert(array(
            array('name'=> 'Single Phase'),
            array('name'=> 'Two Phase'),
            array('name'=> 'Three Phase')
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('electric_power_systems');
    }
}
