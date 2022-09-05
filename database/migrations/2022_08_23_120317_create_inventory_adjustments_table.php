<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryAdjustmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_adjustments', function (Blueprint $table) {
            $table->id();
            $table->string('batch_code')->nullable();
            $table->string('adj_type')->nullable();
            $table->string('adj_name')->nullable();
            $table->string('target_storage')->nullable();
            $table->dateTime('production_date')->nullable();
            $table->string('receiver_name')->nullable();
            $table->string('invoice_no')->nullable();
            $table->dateTime('adjustment_date')->nullable();
            $table->unsignedInteger('supply_item_id')->nullable();
            $table->string('type')->nullable();
            $table->string('variant')->nullable();
            $table->unsignedInteger('processing_grade_id')->nullable();
            $table->unsignedInteger('processing_block_id')->nullable();
            $table->unsignedInteger('processing_block_size_id')->nullable();
            $table->unsignedInteger('export_pack_size_id')->nullable();
            $table->integer('mc_quantity')->nullable();
            $table->integer('quantity')->nullable();
            $table->double('final_weight')->nullable();
            $table->longText('remark')->nullable();
            $table->enum('status',['Pending','Confirm'])->default('Pending');
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
        Schema::dropIfExists('inventory_adjustments');
    }
}
