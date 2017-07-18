<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('contact_sources', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('url')->nullable();
        });
        
        DB::table('contact_sources')->insert(array(
            array('name' => 'Commercial')
            ,array('name' => 'Web')
            ,array('name' => 'Idealista')
            ,array('name' => 'Fotocasa')
            ,array('name' => 'Segundamano')
            ,array('name' => 'Pisos.com')
            ,array('name' => 'Enalquiler')
            ,array('name' => 'Yaencontre')
            ,array('name' => 'Recommended')
            ,array('name' => 'Adpost')
            ,array('name' => 'Doorman')
            ,array('name' => 'Colaborator')
            ,array('name' => 'Other')
            ,array('name' => 'Ventadepisos')
            ,array('name' => 'Recruiter')
            ,array('name' => 'Kyero')
            ,array('name' => 'ImmoVario')
            ,array('name' => 'MasProfesional')
            ,array('name' => 'Tucasa')
            ,array('name' => 'Trovit')
            ,array('name' => 'Supercasa')
            ,array('name' => 'A place in the sun')
            ,array('name' => 'Atrapanos')
            ,array('name' => 'Globaliza')
            ,array('name' => 'Habitaclia')
            ,array('name' => 'Haya')
            ,array('name' => 'Aliseda')
            ,array('name' => 'Call center')
            ,array('name' => 'ThinkSPAIN')
            ,array('name' => 'Mootz')
            ,array('name' => 'Rightmove')
            ,array('name' => 'Zoopla')
            ,array('name' => 'GoPlaceIt')
            ,array('name' => 'Metro Cuadrado')
            ,array('name' => 'Inmovario')
            ,array('name' => 'Trovimap')
            ,array('name' => 'Mitula')
            ,array('name' => 'FlatAlert')
            ,array('name' => 'GreenAcres')
            ,array('name' => 'Dompick')
            ,array('name' => 'Realo')
            ,array('name' => 'Winder')
            ,array('name' => 'Luxury Estate')
            ,array('name' => 'Anticipa')
            ,array('name' => 'Servihabitat')
            ,array('name' => 'Facebook')
            ,array('name' => 'Sareb')
            ,array('name' => 'MilAnuncios')
            ,array('name' => 'Office')
            ,array('name' => 'Misoficinas')
            ,array('name' => 'Mislocales')
            ,array('name' => 'Misnaves')
            ,array('name' => 'tusitio')));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_sources');
    }
}
