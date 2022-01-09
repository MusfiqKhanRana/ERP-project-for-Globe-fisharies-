<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('order_id')->nullable();
            $table->unsignedInteger('product_id')->nullable();
            $table->unsignedInteger('warehouse_id')->nullable();
            $table->string('quantity')->nullable();
            $table->string('discount_in_amount')->nullable();
            $table->string('discount_in_percentage')->nullable();
            $table->double('selling_price')->nullable();
            $table->enum('status', ['Received','Returned'])->default('Received');
            $table->longText('SinglecancelMassage')->nullable();
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
        Schema::dropIfExists('product_orders');
    }
}
