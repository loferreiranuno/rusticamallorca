<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('model_type_id')->unsigned();
            $table->string('name');
            $table->text('text');
            $table->timestamps();
        });

        Schema::table('model_templates', function(Blueprint $table){
            $table->foreign('model_type_id')->references('id')->on('model_template_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model_templates');
    }
}
