<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiffinBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiffin_bills', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->unsignedInteger('employee_id')->nullable();
            $table->unsignedInteger('department_id')->nullable();
            $table->unsignedInteger('designation_id')->nullable();
            $table->string('category')->nullable();
            $table->boolean('is_paid')->nullable();
            $table->integer('rate')->nullable();
            $table->integer('days')->nullable();
            $table->integer('total')->nullable();
            $table->date('paid_date')->nullable();
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
        Schema::dropIfExists('tiffin_bills');
    }
}
