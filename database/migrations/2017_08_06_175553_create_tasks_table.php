<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');

            $table->datetime('start_date');
            $table->datetime('end_date');

            $table->boolean('done')->default(true);

            $table->unsignedInteger('task_kind_id')->nullable();
            $table->unsignedInteger('contact_id')->nullable();
            $table->unsignedInteger('user_id')->nullable(); 
            $table->unsignedInteger('creator_id')->nullable();
            $table->unsignedInteger('product_id')->nullable();

            $table->text('description');

            $table->timestamps();
        });
        
        Schema::table('tasks', function(Blueprint $table){

            $table->foreign('task_kind_id')
            ->references('id')->on('task_kinds')
            ->onDelete('cascade'); 

            $table->foreign('contact_id')
            ->references('id')->on('contacts')
            ->onDelete('cascade'); 

            $table->foreign('product_id')
            ->references('id')->on('products')
            ->onDelete('cascade'); 
            
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade'); 
            
            $table->foreign('creator_id')
            ->references('id')->on('users')
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
        Schema::dropIfExists('tasks');
    }
}
