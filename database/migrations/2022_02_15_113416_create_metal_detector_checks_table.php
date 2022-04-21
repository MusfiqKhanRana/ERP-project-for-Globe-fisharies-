<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetalDetectorChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metal_detector_checks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('production_processing_unit_id')->nullable();
            $table->dateTime('date')->nullable();
            $table->string('section')->nullable();
            $table->string('metal_detector')->nullable();
            $table->string('shift')->nullable();
            $table->time('time')->nullable();
            $table->string('ferrous')->nullable();
            $table->string('nonferrous')->nullable();
            $table->string('stainless_steel')->nullable();
            $table->string('poly_bag')->nullable();
            $table->string('monitoring_person')->nullable();
            $table->string('qc_supervisor')->nullable();
            $table->string('verifying_person')->nullable();
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('metal_detector_checks');
    }
}
