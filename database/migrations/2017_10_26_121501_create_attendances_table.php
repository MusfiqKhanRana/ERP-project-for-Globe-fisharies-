<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->dateTime('date')->nullable();
            $table->Time('in_time')->nullable();
            $table->Time('out_time')->nullable();
            $table->text('other_times')->nullable();
            $table->enum('status', ['Absent','Present','Medical','Casual','Special','Earned','Office','Early','Late','Delay','Weekly Holiday','Holiday','Application Applied','Late Application Accepted','Absent Application Denied','Late Application Denied'])->default('Absent');
            $table->string('ip')->nullable();
            $table->string('device')->nullable();
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
        Schema::dropIfExists('attendances');
    }
}
