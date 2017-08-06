<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('task_feedbacks', function (Blueprint $table) {         
            $table->unsignedInteger('task_id');
            $table->unsignedInteger('feedback_id');
        });

        Schema::table('task_feedbacks', function (Blueprint $table) {
            
            $table->unique(['task_id', 'feedback_id']);

            $table->foreign('task_id')
                ->references('id')->on('tasks')
                ->onDelete('cascade');

            $table->foreign('feedback_id')
                ->references('id')->on('feedback_types')
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
        Schema::dropIfExists('task_feedbacks');
    }
}
