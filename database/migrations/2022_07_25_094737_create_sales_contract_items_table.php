<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesContractItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_contract_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('sales_contract_id')->nullable();
            $table->string('consignment_type')->nullable();
            $table->string('hs_code')->nullable();
            $table->string('processing_type')->nullable();
            $table->string('processing_variant')->nullable();
            $table->unsignedInteger('supply_item_id')->nullable();
            $table->unsignedInteger('fish_grade_id')->nullable();
            $table->double('block_quantity')->nullable();
            $table->unsignedInteger('block_fish_grade_id')->nullable();
            $table->unsignedInteger('block_size_id')->nullable();
            $table->unsignedInteger('export_pack_size_id')->nullable();
            $table->string('block_size')->nullable();
            $table->string('block_name')->nullable();
            $table->integer('cartons')->nullable();
            $table->string('total_in_kg')->nullable();
            $table->string('rate')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('freight_rate')->nullable();
            $table->string('total_cfr_rate')->nullable();
            $table->string('total_cif_rate')->nullable();
            $table->string('total_amount_cfr')->nullable();
            $table->string('total_amount_cif')->nullable();
            $table->date('expiry_date')->nullable();
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
        Schema::dropIfExists('sales_contract_items');
    }
}
