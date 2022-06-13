<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('gross_salary')->nullable();
            $table->unsignedInteger('overtime_payment')->nullable();
            $table->unsignedInteger('absent_fine')->nullable();
            $table->unsignedInteger('late_fine')->nullable();
            $table->unsignedInteger('advance_salary_payment')->nullable();
            $table->unsignedInteger('loan_installment_payment')->nullable();
            $table->unsignedInteger('net_payment')->nullable();
            $table->dateTime('disburse_date')->nullable();
            $table->date('salary_month')->nullable();
            $table->boolean('is_paid')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
