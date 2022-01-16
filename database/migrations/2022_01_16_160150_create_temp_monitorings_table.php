<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempMonitoringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_monitorings', function (Blueprint $table) {
            $table->id();
            $table->integer('cold_storage_id');
            $table->string('temp_c_ddt');
            $table->string('temp_c_dts');
            $table->string('master_carton_no');
            $table->string('commodity_count');
            $table->dateTime('date_of_production');
            $table->string('block_core_temp');
            $table->longText('remarks');
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
        Schema::dropIfExists('temp_monitorings');
    }
}
