<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('agent_id')->nullable();
            $table->integer('driver_id')->nullable();
            $table->string('batch_no')->nullable();
            $table->string('batch_sr_no')->nullable();
            $table->string('card_no')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('cif_no')->nullable();
            $table->string('civil_id')->nullable();
            $table->integer('mobile_no')->nullable();
            $table->integer('telephone_no')->nullable();
            $table->timestamp('delivery_date')->nullable();
            $table->integer('governorate_id')->nullable();
            $table->integer('area_id')->nullable();
            $table->integer('block_id')->nullable();
            $table->text('street')->nullable();
            $table->text('avenue')->nullable();
            $table->text('house_no')->nullable();
            $table->text('floor')->nullable();
            $table->text('flat')->nullable();
            $table->text('latitude')->nullable();
            $table->text('longitude')->nullable();
            $table->tinyInteger('status')->comment('0 = out_for_delivery, 1 = return_to_bank, 2 = delivered, 3 = others');
            $table->text('remark')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
    }
}
