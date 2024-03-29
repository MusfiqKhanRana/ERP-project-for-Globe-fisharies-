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
            $table->enum('status', ['Pending', 'Confirm','Approved','InGateman','Unload','Reject','Returned','InProduction','Received'])->default('Pending');
            $table->text('remark')->nullable();
            $table->dateTime('expected_date')->nullable();
            $table->dateTime('confirm_date')->nullable();
            $table->dateTime('approved_date')->nullable();
            $table->dateTime('in_gateman_date')->nullable();
            $table->dateTime('reject_date')->nullable();
            $table->dateTime('returned_date')->nullable();
            $table->dateTime('in_production_date')->nullable();
            $table->dateTime('receive_date')->nullable();
            $table->longText('reject_note')->nullable();
            $table->longText('return_note')->nullable();
            $table->string('vehicle_number')->nullable();
            $table->string('challan_number')->nullable();
            $table->longText('gateman_remark')->nullable();
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
