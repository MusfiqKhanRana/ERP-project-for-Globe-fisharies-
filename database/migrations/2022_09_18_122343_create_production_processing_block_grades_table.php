<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionProcessingBlockGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_processing_block_grades', function (Blueprint $table) {
            $table->id();
            $table->string('batch_code')->nullable();
            $table->unsignedInteger('grade_id')->nullable();
            $table->unsignedInteger('production_processing_unit_id')->nullable();
            $table->string('grade_name')->nullable();
            $table->double('grade_quantity')->nullable();
            $table->dateTime('grading_date')->nullable();
            $table->double('soaking_weight')->nullable();
            $table->dateTime('soaking_weight_datetime')->nullable();
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
        Schema::dropIfExists('production_processing_block_grades');
    }
}
