<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionGeneralPurchaseQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_general_purchase_quotations', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('supplier_id')->nullable();
            $table->unsignedInteger('requisition_id')->nullable();
            $table->unsignedInteger('production_purchase_requisition_item_id')->nullable();
            $table->integer('price')->nullable();
            $table->string('speciality')->nullable();
            $table->string('remark')->nullable();
            $table->integer('negotiable_price')->nullable();
            $table->string('cs_remark')->nullable();
            $table->boolean('is_confirm')->nullable();
            $table->enum('status', ['InQuotation','InCS'])->default('InQuotation');
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
        Schema::dropIfExists('production_general_purchase_quotations');
    }
}
