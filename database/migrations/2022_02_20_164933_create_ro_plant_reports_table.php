<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoPlantReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ro_plant_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('ro_plants_id')->nullable();
            $table->string('start_tym')->nullable();
            $table->string('stop_tym')->nullable();
            $table->string('t_time')->nullable();
            $table->string('rwst_cl_c')->nullable();
            $table->string('p_inlet1')->nullable();
            $table->string('p_outlet1')->nullable();
            $table->string('cl_check1')->nullable();
            $table->string('p_inlet2')->nullable();
            $table->string('p_outlet2')->nullable();
            $table->string('cl_check2')->nullable();
            $table->string('p_inlet3')->nullable();
            $table->string('p_outlet3')->nullable();
            $table->string('cl_check3')->nullable();
            $table->string('p_inlet_bar')->nullable();
            $table->string('dds_point')->nullable();
            $table->string('p_of_da')->nullable();
            $table->string('cds_point')->nullable();
            $table->string('p_of_cs')->nullable();
            $table->string('ph')->nullable();
            $table->string('conductance')->nullable();
            $table->string('tds')->nullable();
            $table->string('chloride')->nullable();
            $table->string('pwf')->nullable();
            $table->string('dwf')->nullable();
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
        Schema::dropIfExists('ro_plant_reports');
    }
}
