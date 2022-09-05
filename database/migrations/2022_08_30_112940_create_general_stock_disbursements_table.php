<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralStockDisbursementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_stock_disbursements', function (Blueprint $table) {
            $table->id();
            $table->dateTime('disbursement_date')->nullable();
            $table->unsignedInteger('department_id')->nullable();
            $table->unsignedInteger('requested_by')->nullable();
            $table->longText('remarks')->nullable();
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
        Schema::dropIfExists('general_stock_disbursements');
    }
}
