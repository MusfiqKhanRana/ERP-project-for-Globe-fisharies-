<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionSupplierItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_supplier_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('production_supplier_id')->nullable();
            $table->unsignedInteger('supply_item_id')->nullable();
            $table->integer('rate')->nullable();
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
        Schema::dropIfExists('production_supplier_items');
    }
}
