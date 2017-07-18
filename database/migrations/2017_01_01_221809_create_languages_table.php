<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('name');
            $table->string('code');
            $table->unique(['code']);
        });

        DB::table('languages')->insert(array(
            array('name'=>'English', 'code'=>'en'),
            array('name'=>'Spanish', 'code'=>'es')
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages');
    }
}
