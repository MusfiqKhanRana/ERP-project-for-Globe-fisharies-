<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionPurchaseRequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_purchase_requisitions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('department_id')->nullable();
            $table->integer('requested_by')->nullable();
            $table->enum('status', ['Pending','Confirm','Reject','Purchased'])->default('Pending');
            $table->dateTime('confirm_date')->nullable();
            $table->dateTime('reject_date')->nullable();
            $table->dateTime('purchase_date')->nullable();
            $table->longText('remark')->nullable();
            $table->integer('requisition_code')->nullable();
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
        Schema::dropIfExists('production_purchase_requisitions');
    }
}
