<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_tests', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date')->nullable();
            $table->text('description')->nullable();
            $table->string('replace_record')->nullable();
            $table->text('remark')->nullable();
            $table->string('frozen')->nullable();
            $table->string('bayer')->nullable();
            $table->string('manager')->nullable();
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
        Schema::dropIfExists('production_tests');
    }
}
