<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryExportDamagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_export_damages', function (Blueprint $table) {
            $table->id();
            $table->string('processing_type')->nullable();
            $table->string('processing_variant')->nullable();
            $table->unsignedInteger('item_id')->nullable();
            $table->unsignedInteger('processing_grade_id')->nullable();
            $table->integer('damage_quantity')->nullable();
            $table->string('image')->nullable();
            $table->unsignedInteger('fish_grade')->nullable();
            $table->unsignedInteger('block_size')->nullable();
            $table->double('block_quantity')->nullable();
            $table->double('final_weight')->nullable();
            $table->text('remark')->nullable();
            $table->enum('damage_form',['Export-1','Export-2','Bulk'])->nullable();
            $table->string('batch_code')->nullable();
            $table->string('export_batch_code')->nullable();
            $table->unsignedInteger('export_pack_size_id')->nullable();
            $table->double('transfer_qty_ctn')->nullable();
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
        Schema::dropIfExists('inventory_export_damages');
    }
}
