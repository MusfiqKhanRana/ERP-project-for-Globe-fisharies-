<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficeLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('office_loans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->enum('type',['advance','loan'])->default('advance');
            $table->double('amount')->nullable();
            $table->integer('instalment')->nullable();
            $table->date('period')->nullable();
            $table->date('date')->nullable();
            $table->text('instalment_dates')->nullable();
            $table->text('attachment')->nullable();
            $table->text('detail')->nullable();
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
        Schema::dropIfExists('office_loans');
    }
}
