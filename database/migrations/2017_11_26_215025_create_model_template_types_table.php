<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelTemplateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_template_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code');
            $table->timestamps();
        });
        DB::table('model_template_types')->insert(
            array(
                array('name'=> 'Lease', "code"=> "lease"),
                array('name'=> 'Down payment', "code"=> "down_payment"),
                array('name'=> 'Buyer commission statement', "code"=> "buyer_commission"),
                array('name'=> 'Seller commission statement', "code"=> "seller_commission"),
                array('name'=> 'Key return agreement', "code"=> "key_return"),
                array('name'=> 'Key receive agreement', "code"=> "key_receive"),
                array('name'=> 'Down payment receive agreement', "code"=> "down_payment_receive"),
                array('name'=> 'Visit report agreement', "code"=> "visit_report"),
            )
        );
    }
// <select class="select form-control select2-hidden-accessible" id="id_kind" name="kind" required="" tabindex="-1" aria-hidden="true" style="display: none;">
// <option value="" selected="selected">---------</option>
// <option value="lease">Lease agreement</option>
// <option value="down_payment">Down payment agreement</option>
// <option value="buyer_commission">Buyer commission statement</option>
// <option value="seller_commission">Seller commission statement</option>
// <option value="key_return">Key return agreement</option>
// <option value="key_receive">Key receive agreement</option>
// <option value="down_payment_receive">Down payment receive agreement</option>
// <option value="visit_report">Visit report agreement</option>
// </select>
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model_template_types');
    }
}
