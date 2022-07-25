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
            $table->string('consignment_type')->nullable();
            $table->string('hs_code')->nullable();
            $table->string('processing_type')->nullable();
            $table->string('processing_variant')->nullable();
            $table->string('item_name')->nullable();
            $table->string('grade')->nullable();
            $table->string('pack_size')->nullable();
            $table->string('block_size')->nullable();
            $table->string('block_name')->nullable();
            $table->integer('cartons')->nullable();
            $table->string('total_in_kg')->nullable();
            $table->string('rate')->nullable();
            $table->string('total_amount')->nullable();
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
