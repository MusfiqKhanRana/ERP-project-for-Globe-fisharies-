<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionSupplyListItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_supply_list_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('production_supply_list_id')->nullable();
            $table->unsignedInteger('item_id')->nullable();
            $table->unsignedInteger('grade_id')->nullable();
            $table->string('grade_name')->nullable();
            $table->integer('quantity')->nullable();
            $table->enum('status', ['Done','NotDone']);
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
        Schema::dropIfExists('production_supply_list_items');
    }
}
