<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionUserPerformancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_user_performances', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('item_id')->nullable();
            $table->text('performance_info')->nullable();
            $table->unsignedInteger('submited_by')->nullable();
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
        Schema::dropIfExists('production_user_performances');
    }
}
