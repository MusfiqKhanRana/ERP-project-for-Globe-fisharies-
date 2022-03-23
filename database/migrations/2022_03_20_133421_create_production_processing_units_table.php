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
            $table->enum('status', ['Initial', 'Grading','Blocking','BlockCounter','clean','Soaking', 'Glazing','ExcessVolume',"RandW"])->default('Initial');
            $table->enum('type', ['Regular', 'Grading','Block'])->default('Regular');
            $table->unsignedInteger('alive_quantity')->nullable();
            $table->unsignedInteger('dead_quantity')->nullable();
            $table->unsignedInteger('Initial_weight')->nullable();
            $table->dateTime('initial_weight_datetime')->nullable();
            $table->unsignedInteger('cleaning_weight')->nullable();
            $table->dateTime('cleaning_weight_datetime')->nullable();
            $table->unsignedInteger('wastage_quantity')->nullable();
            $table->unsignedInteger('return_quantity')->nullable();
            $table->dateTime('RandW_datetime')->nullable();
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
