<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProductOfferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('product_offers', function(Blueprint $table){
            $table->boolean("sold")->default(false);            
            $table->boolean("rejected")->default(false); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_offers', function($table) { 
            $table->dropColumn('sold');
            $table->dropColumn('rejected');
        });
    }
}
