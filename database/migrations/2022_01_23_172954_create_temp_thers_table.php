<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempThersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_thers', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->time('load_time')->nullable();
            $table->time('unload_time')->nullable();
            $table->string('freezer_no')->nullable();
            $table->string('info_temp')->nullable();
            $table->text('remark')->nullable();
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
        Schema::dropIfExists('temp_thers');
    }
}
