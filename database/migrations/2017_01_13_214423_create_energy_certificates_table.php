<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnergyCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('energy_certificates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); 
        });
        // A, B, C, D, E, F, G, Not Specified, In Progress
        DB::table('energy_certificates')->insert(array(
            array('name'=> 'A'),
            array('name'=> 'B'),
            array('name'=> 'C'),
            array('name'=> 'D'),
            array('name'=> 'E'),
            array('name'=> 'F'),
            array('name'=> 'G'),
            array('name'=> 'Not Specified'),
            array('name'=> 'In Progress')            
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('energy_certificates');
    }
}
