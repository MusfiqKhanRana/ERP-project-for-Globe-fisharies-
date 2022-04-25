<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_shifts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->time('entry_time')->nullable();
            $table->time('delay_time')->nullable();
            $table->time('late_time')->nullable();
            $table->time('out_time')->nullable();
            $table->time('over_time')->nullable();
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
        Schema::dropIfExists('user_shifts');
    }
}
