<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionExportInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_export_inventories', function (Blueprint $table) {
            $table->id();
            $table->string('batch_code')->nullable();
            $table->string('storage_name')->nullable();
            $table->string('processing_name')->nullable();
            $table->string('processing_variant')->nullable();
            $table->unsignedInteger('item_id')->nullable();
            $table->unsignedInteger('processing_grade_id')->nullable();
            $table->unsignedInteger('export_pack_size_id')->nullable();
            $table->integer('transfer_qty_ctn')->nullable();
            $table->integer('transfer_qty_kg')->nullable();
            $table->unsignedInteger('block_size')->nullable();
            $table->unsignedInteger('fish_grade')->nullable();
            $table->double('block_quantity')->nullable();
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
        Schema::dropIfExists('production_export_inventories');
    }
}
