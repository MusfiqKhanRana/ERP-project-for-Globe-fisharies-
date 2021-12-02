<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCutomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cutomers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('designation');
            $table->string('full_name');
            $table->string('phone');
            $table->string('email');
            $table->string('customer_type');
            $table->boolean('activated');
            $table->string('address');
            $table->unsignedInteger('area_id');
            $table->text('include_word');
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
        Schema::dropIfExists('cutomers');
    }
}
