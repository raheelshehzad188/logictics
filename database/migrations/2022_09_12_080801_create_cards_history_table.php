<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('card_id')->nullable();
            $table->integer('status_id')->nullable()->comment('0 = out_for_delivery, 1 = return_to_bank, 2 = delivered, 3 = others');
            $table->integer('agent_id')->nullable();
            $table->integer('driver_id')->nullable();
            $table->integer('updated_by')->nullable();
            $table->text('remark')->nullable();
            $table->tinyInteger('notify')->nullable();
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
        Schema::dropIfExists('cards_history');
    }
}
