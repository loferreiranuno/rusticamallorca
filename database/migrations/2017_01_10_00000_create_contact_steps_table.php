<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('contact_steps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
 
        DB::table('contact_steps')->insert(
            array(
            array('name' => 'lead'),
            array('name' => 'prospect'),
            array('name' => 'visiting'),
            array('name' => 'negotiation'),
            array('name' => 'won'),
            array('name' => 'lost'))
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_steps');
    }
}
