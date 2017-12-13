<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('product_id'); // product
            $table->unsignedInteger('template_id')->nullable(); //model template
            $table->unsignedInteger('creator_id')->nullable(); //user;
            $table->unsignedInteger('comercial_id')->nullable(); //user;
            $table->unsignedInteger('visitor_id')->nullable(); //contact;

            $table->unsignedInteger('first_buyer_id')->nullable(); //contact;
            $table->unsignedInteger('first_seller_id')->nullable(); //contact - type owner;
            $table->unsignedInteger('first_owner_id')->nullable(); //contact - type owner;
            $table->unsignedInteger('second_buyer_id')->nullable(); //contact;
            $table->unsignedInteger('second_seller_id')->nullable(); //contact - type owner;
            $table->unsignedInteger('second_owner_id')->nullable(); //contact - type owner;
            
            $table->unsignedInteger('lessor_id')->nullable(); //contact - type owner;
            $table->unsignedInteger('first_lessee')->nullable(); //contact  
            $table->unsignedInteger('second_lessee')->nullable(); //contact  
            $table->unsignedInteger('third_lessee')->nullable(); //contact             

            $table->date("agreement_date")->nullable();
            $table->string("agreement_time")->nullable();

            $table->date("limit_date_title_land_granting")->nullable();
            $table->date("initial_renting_date")->nullable();
            $table->date("next_payment_date")->nullable();

            $table->integer("max_years_extend_time")->nullable();
            $table->integer("max_days_warn_revoke")->nullable();

            $table->decimal("rent_amount_year", 12, 2)->nullable();
            $table->decimal("rent_amount_year_spelled", 12, 2)->nullable();
            $table->decimal("rent_amount_month", 12, 2)->nullable();
            $table->decimal("rent_amount_month_spelled", 12, 2)->nullable();
            $table->decimal("first_payment", 12, 2)->nullable();
            $table->decimal("first_payment_spelled", 12, 2)->nullable();
            $table->decimal("first_payment_month", 12, 2)->nullable();
            $table->decimal("first_payment_year", 12, 2)->nullable();
            $table->decimal("bond", 12, 2)->nullable();
            $table->decimal("bond_spelled", 12, 2)->nullable();
            $table->decimal("deposit", 12, 2)->nullable();
            $table->decimal("deposit_spelled", 12, 2)->nullable();
            $table->decimal("current_water_meter", 12, 2)->nullable();
            $table->decimal("current_gas_meter", 12, 2)->nullable();
            $table->decimal("current_electricity_meter", 12, 2)->nullable();
            $table->decimal("commission_amount", 12, 2)->nullable();
            $table->decimal("selling_commission_amount", 12, 2)->nullable();
            $table->decimal("down_payment_amount", 12, 2)->nullable();
            $table->decimal("down_payment_amount_spelled", 12, 2)->nullable();
            $table->decimal("full_selling_amount", 12, 2)->nullable();
            $table->decimal("full_selling_amount_spelled", 12, 2)->nullable();
            $table->decimal("remaining_selling_amount", 12, 2)->nullable();
            $table->decimal("remaining_selling_amount_spelled", 12, 2)->nullable();
            $table->timestamps();
        });


        Schema::table('contracts', function(Blueprint $table){

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('template_id')->references('id')->on('model_templates');
            $table->foreign('creator_id')->references('id')->on('users');
            $table->foreign('comercial_id')->references('id')->on('users');
            $table->foreign('visitor_id')->references('id')->on('contacts');

            $table->foreign('first_buyer_id')->references('id')->on('contacts'); //contact;
            $table->foreign('first_seller_id')->references('id')->on('contacts'); //contact - type owner;
            $table->foreign('first_owner_id')->references('id')->on('contacts'); //contact - type owner;
            $table->foreign('second_buyer_id')->references('id')->on('contacts'); //contact;
            $table->foreign('second_seller_id')->references('id')->on('contacts'); //contact - type owner;
            $table->foreign('second_owner_id')->references('id')->on('contacts'); //contact - type owner;
            
            $table->foreign('lessor_id')->references('id')->on('contacts'); //contact - type owner;
            $table->foreign('first_lessee')->references('id')->on('contacts'); //contact  
            $table->foreign('second_lessee')->references('id')->on('contacts'); //contact  
            $table->foreign('third_lessee')->references('id')->on('contacts'); //contact  

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}
