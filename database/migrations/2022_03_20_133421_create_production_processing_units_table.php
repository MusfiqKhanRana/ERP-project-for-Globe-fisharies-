<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionProcessingUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_processing_units', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('requisition_id')->nullable();
            $table->unsignedInteger('requisition_code')->nullable();
            $table->unsignedInteger('item_id')->nullable();
            $table->unsignedInteger('invoice_code')->nullable();
            $table->string('processing_code')->nullable();
            $table->string('processing_name')->nullable();
            $table->string('processing_variant')->nullable();
            $table->enum('status', ['Initial', 'Grading','Blocking','BlockCounter','Clean','Soaking', 'Glazing','ExcessVolume',"RandW",'StoreIn','Bulk_storage'])->default('Initial');
            $table->enum('type', ['Regular', 'Grading','Block'])->default('Regular');
            $table->unsignedDouble('alive_quantity')->nullable();
            $table->unsignedInteger('dead_quantity')->nullable();
            $table->unsignedDouble('Initial_weight')->nullable();
            $table->dateTime('initial_weight_datetime')->nullable();
            $table->unsignedDouble('fillet_soaking_weight')->nullable();
            $table->dateTime('fillet_soaking_weight_datetime')->nullable();
            $table->unsignedDouble('fillet_glazing_weight')->nullable();
            $table->dateTime('fillet_glazing_weight_datetime')->nullable();
            $table->unsignedDouble('cleaning_weight')->nullable();
            $table->dateTime('cleaning_weight_datetime')->nullable();
            $table->unsignedDouble('wastage_quantity')->nullable();
            $table->unsignedDouble('return_quantity')->nullable();
            $table->dateTime('RandW_datetime')->nullable();
            $table->enum('store_in_status', ['Initial','Bulk_storage'])->default('Initial');
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
        Schema::dropIfExists('production_processing_units');
    }
}
