<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableProductImageAddOriginalFileName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_images', function($table) {
            $table->renameColumn('fileName', 'file_name');

            if (Schema::hasColumn('product_images', 'original_name'))
            {
                Schema::table('product_images', function (Blueprint $table)
                {
                    $table->dropColumn('original_name');
                });
            } 
            
            $table->string('original_name')->after('product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_images', function($table) {
            $table->renameColumn('file_name', 'fileName');
            $table->dropColumn('original_name');
        });
    }
}
