<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionPurchaseRequisitionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_purchase_requisition_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('production_purchase_requisition_id')->nullable();
            $table->unsignedInteger('item_id')->nullable();
            $table->string('item_name')->nullable();
            $table->unsignedInteger('item_type_id')->nullable();
            $table->string('item_type_name')->nullable();
            $table->unsignedInteger('item_unit_id')->nullable();
            $table->string('item_unit_name')->nullable();
            $table->dateTime('demand_date')->nullable();
            $table->string('image')->nullable();
            $table->integer('quantity')->nullable();
            $table->double('closing_stock')->nullable();
            $table->string('supplier_info')->nullable();
            $table->string('confirm_rate')->nullable();
            $table->longText('specification')->nullable();
            $table->enum('status', ['AddQuotation','ShowQuotation','ConfirmQuotation','QuotationNegotiation','InPurchase','InStock'])->default('AddQuotation');
            $table->longText('remark')->nullable();
            $table->integer('requisition_code')->nullable();
            $table->dateTime('check_in_time')->nullable();
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
        Schema::dropIfExists('production_purchase_requisition_items');
    }
}
