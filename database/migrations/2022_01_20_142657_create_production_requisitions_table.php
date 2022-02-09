<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionRequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_requisitions', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_code')->nullable();
            $table->unsignedInteger('production_supplier_id')->nullable();
            $table->enum('status', ['Pending', 'Confirm','Approved', 'Reject','Returned','InProduction','Received'])->default('Pending');
            $table->text('details')->nullable();
            $table->dateTime('confirm_date')->nullable();
            $table->dateTime('approved_date')->nullable();
            $table->dateTime('reject_date')->nullable();
            $table->dateTime('returned_date')->nullable();
            $table->dateTime('in_production_date')->nullable();
            $table->dateTime('receive_date')->nullable();
            $table->dateTime('reject_note')->nullable();
            $table->dateTime('return_note')->nullable();
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
        Schema::dropIfExists('production_requisitions');
    }
}
