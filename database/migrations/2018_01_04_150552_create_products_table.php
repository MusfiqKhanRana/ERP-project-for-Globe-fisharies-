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
            $table->string('processing_name')->nullable();
            $table->string('variant')->nullable();
            $table->unsignedInteger('supply_item_id')->nullable();
            $table->unsignedInteger('product_id')->nullable();
            //$table->string('buying_price')->nullable();
            //$table->string('selling_price')->nullable();
            $table->string('online_selling_price')->nullable();
            $table->string('inhouse_selling_price')->nullable();
            $table->unsignedInteger('pack_id')->nullable();
            $table->string('safety_stock')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('products');
    }
}
