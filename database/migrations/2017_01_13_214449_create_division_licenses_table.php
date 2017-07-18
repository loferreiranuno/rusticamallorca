<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivisionLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('division_licenses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); 
        });
        //Not Specified, In Progress, Granted
        DB::table('division_licenses')->insert(array(
            array('name'=> 'Not Specified'),
            array('name'=> 'In Progress'),
            array('name'=> 'Granted')
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('division_licenses');
    }
}
