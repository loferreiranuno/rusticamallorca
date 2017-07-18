<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
                       
            $table->unsignedInteger('creator_id')->nullable();
            $table->unsignedInteger('recruiter_id')->nullable();
            $table->unsignedInteger('manager_id')->nullable();

            $table->unsignedInteger('owner_id')->nullable();                        
            $table->unsignedInteger('partner_id')->nullable();

            


            $table->unsignedInteger('product_status_id')->nullable();
            $table->unsignedInteger('product_kind_id')->nullable(); 
            $table->unsignedInteger('renting_period_id')->nullable(); 
            $table->unsignedInteger('energy_certificate_id')->nullable();  
            $table->unsignedInteger('division_license_id')->nullable(); 
            $table->unsignedInteger('electric_power_system_id')->nullable();
            $table->unsignedInteger('public_access_id')->nullable();
            $table->unsignedInteger('agreement_type_id')->nullable(); 

            $table->string('city_name', 50)->nullable();
            $table->string('zip_code', 20)->nullable();
            $table->string('street_name', 50)->nullable();
            $table->string('street_number', 25)->nullable();

            $table->float('latitude', 10, 6)->nullable();
            $table->float('longitude', 10, 6)->nullable();

            $table->string('district', 50)->nullable();
            $table->string('zone', 50)->nullable();
            $table->string('urbanization', 50)->nullable();
            $table->string('block', 50)->nullable();
            $table->string('doorway', 20)->nullable();
            $table->string('door', 20)->nullable();
 
            $table->string('identifier')->nullable();

            $table->integer('floors')->nullable();
            $table->integer('rooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->integer('area')->nullable();
            $table->integer('area_util')->nullable();
            $table->integer('area_underground')->nullable();
            $table->integer('area_first_floor')->nullable();
            $table->integer('window_area')->nullable();
            $table->integer('ceiling_height')->nullable();
            $table->integer('year')->nullable();
            $table->decimal('building_expenses', 5, 2)->nullable();

            $table->integer('building_floors')->nullable();
            $table->integer('building_floors_expand')->nullable();
            $table->integer('building_front')->nullable();
            $table->integer('building_depth')->nullable();
            $table->integer('plot_area')->nullable();

            $table->boolean('renting_enabled')->default(false);
            $table->decimal('renting_cost', 5, 2)->nullable();
            $table->decimal('renting_agency_fee', 5, 2)->nullable();
            $table->decimal('renting_bond', 5, 2)->nullable();
            $table->decimal('renting_deposit', 5, 2)->nullable();

            $table->boolean('vacation_enabled')->default(false);
            $table->string('vacation_register_number')->nullable();

            $table->boolean('selling_enabled')->default(false);
            $table->boolean('selling_cost_visible')->default(false);
            $table->decimal('selling_cost', 5, 2)->nullable();
 
            $table->string('video_url')->nullable();
            $table->string('virtual_visit_url')->nullable();
            $table->string('external_url')->nullable();

            //Private Date;
            $table->string("register_number")->nullable();
            $table->boolean('keys')->default(false);
            $table->text('internal_notes')->nullable();

            $table->boolean('simple_note_enabled')->default(false);
            $table->date('simple_note_date')->nullable();

            $table->boolean('mortage_enabled')->default(false);
            $table->decimal('mortage_cost', 5, 2)->nullable();
            $table->decimal('land_value_tax', 5, 2)->nullable();
 
            //Agreement terms                      
            $table->date('agreement_valid_until')->nullable();
            $table->decimal('agreement_commission_percentage', 5, 2)->nullable();
            $table->decimal('agreement_commission_amount', 5, 2)->nullable();

            //Other
            $table->string('title')->nullable();
            $table->integer('area_in_registry')->nullable();
            $table->integer('terrace_area')->nullable();
            $table->integer('garage_area')->nullable();
            $table->text('magazine_description')->nullable();

            $table->timestamps();
        }); 

        Schema::table('products', function(Blueprint $table){

            $table->foreign('partner_id')
            ->references('id')->on('contacts');
            $table->foreign('owner_id')
            ->references('id')->on('contacts');

            $table->foreign('manager_id')
            ->references('id')->on('users');
            $table->foreign('recruiter_id')
            ->references('id')->on('users');
            $table->foreign('creator_id')
            ->references('id')->on('users');
        
            $table->foreign('product_status_id')
            ->references('id')->on('product_statuses');
            
            $table->foreign('product_kind_id')
            ->references('id')->on('product_kinds');

            $table->foreign('public_access_id')
            ->references('id')->on('public_accesses');
            
            $table->foreign('renting_period_id')
            ->references('id')->on('renting_periods');
            
            $table->foreign('energy_certificate_id')
            ->references('id')->on('energy_certificates');

            $table->foreign('division_license_id')
            ->references('id')->on('division_licenses');
            
            $table->foreign('electric_power_system_id')
            ->references('id')->on('electric_power_systems') ;
            
            $table->foreign('agreement_type_id')
            ->references('id')->on('agreement_types') ;
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
