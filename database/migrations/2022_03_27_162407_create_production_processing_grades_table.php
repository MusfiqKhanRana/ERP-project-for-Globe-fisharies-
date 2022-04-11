<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionProcessingGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_processing_grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('production_processing_unit_id')->nullable();
            $table->unsignedInteger('block_id')->nullable();
            $table->text('block_name')->nullable();
            $table->double('block_value')->nullable();
            $table->string('block_size')->nullable();
            $table->double('block_quantity')->nullable();
            $table->string('excess_volume')->nullable();
            $table->string('block_weight')->nullable();
            $table->unsignedInteger('grade_id')->nullable();
            $table->text('grade_name')->nullable();
            $table->string('grade_quantity')->nullable();
            $table->dateTime('grading_date')->nullable();
            $table->string('soaking_weight')->nullable();
            $table->dateTime('soaking_weight_datetime')->nullable();
            $table->string('soaking_damage')->nullable();
            $table->string('soaking_return')->nullable();
            $table->dateTime('soaking_damage_datetime')->nullable();
            $table->string('glazing_weight')->nullable();
            $table->dateTime('glazing_weight_datetime')->nullable();
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
        Schema::dropIfExists('production_processing_grades');
    }
}
