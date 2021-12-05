<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->unsignedInteger('user_type')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('image')->nullable();
            $table->string('f_name')->nullable();
            $table->string('b_date')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone')->nullable();
            $table->text('local_add')->nullable();
            $table->text('per_add')->nullable();
            $table->integer('employee_id')->unique();
            $table->integer('dept_id')->nullable();
            $table->integer('deg_id')->nullable();
            $table->string('date')->nullable();
            $table->string('salary')->nullable();
            $table->string('branch_address')->nullable();
            $table->string('ac_name')->nullable();
            $table->string('ac_num')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('code')->nullable();
            $table->string('pan_num')->nullable();
            $table->string('branch')->nullable();
            $table->string('resume')->nullable();
            $table->string('offer_letter')->nullable();
            $table->string('join_letter')->nullable();
            $table->string('con_letter')->nullable();
            $table->string('proof')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
