<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_reports', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->unsignedInteger('employee_code')->nullable();
            $table->string('name')->nullable();
            $table->string('dressing')->nullable();
            $table->string('complain')->nullable();
            $table->string('medicine_name')->nullable();
            $table->string('medicine_schedule')->nullable();
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
        Schema::dropIfExists('medical_reports');
    }
}
