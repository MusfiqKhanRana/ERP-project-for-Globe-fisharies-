<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidentFundUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provident_fund_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('provident_fund_id')->nullable();
            $table->date('applied_month')->nullable();
            $table->date('end_month')->nullable();
            $table->text('installments')->nullable();
            $table->date('withdraw_date')->nullable();
            $table->string('remark')->nullable();
            $table->enum('status',['Initial','ongoing','completed','uncompleted','withdraw'])->default('Initial');
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
        Schema::dropIfExists('provident_fund_users');
    }
}
