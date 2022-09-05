<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralStockDisbursementItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_stock_disbursement_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('general_stock_disbursement_id')->nullable();
            $table->unsignedInteger('item_id')->nullable();
            $table->string('item_name')->nullable();
            $table->unsignedInteger('item_type_id')->nullable();
            $table->string('item_type_name')->nullable();
            $table->unsignedInteger('item_unit_id')->nullable();
            $table->string('item_unit_name')->nullable();
            $table->double('quantity')->nullable();
            $table->double('return_quantity')->nullable();
            $table->dateTime('return_quantity_date_time')->nullable();
            $table->double('damage_quantity')->nullable();
            $table->dateTime('damage_quantity_date_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general_stock_disbursement_items');
    }
}
