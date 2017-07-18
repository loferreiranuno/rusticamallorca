<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgreementTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agreement_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); 
        });
        
        //Exclusive, Competition, Owner Colaboration
        DB::table('agreement_types')->insert(array(
            array('name'=> 'Exclusive'),
            array('name'=> 'Competition'),
            array('name'=> 'Owner Colaboration')
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agreement_types');
    }
}
