<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionRequisitionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_requisition_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('production_requisition_id')->nullable();
            $table->unsignedInteger('supply_item_id')->nullable();
            $table->integer('rate')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('received_quantity')->nullable();
            $table->integer('alive_quantity')->nullable();
            $table->integer('dead_quantity')->nullable();
            $table->integer('return_quantity')->nullable();
            $table->text('received_remark')->nullable();
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
        Schema::dropIfExists('production_requisition_items');
    }
}
