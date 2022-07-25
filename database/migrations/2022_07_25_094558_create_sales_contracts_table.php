<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_contracts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('buyer_id')->nullable();
            $table->string('port_of_loading')->nullable();
            $table->string('pre_carring_by')->nullable();
            $table->string('port_of_discharge')->nullable();
            $table->string('final_destination')->nullable();
            $table->dateTime('shipment_date')->nullable();
            $table->string('packaging_responsibility')->nullable();
            $table->string('partial_shipment')->nullable();
            $table->string('trans_shipment')->nullable();
            $table->string('shipping_responsibility')->nullable();
            $table->integer('cfr_rate')->nullable();
            $table->integer('cif_rate')->nullable();
            $table->longText('shipment_remark')->nullable();
            $table->string('payment_method')->nullable();
            $table->double('grand_total')->nullable();
            $table->double('paid_in_percentage')->nullable();
            $table->double('paid_in_amount')->nullable();
            $table->double('due_amount')->nullable();
            $table->string('advising_bank')->nullable();
            $table->string('advising_bank_account_no')->nullable();
            $table->string('advising_bank_swift_code')->nullable();
            $table->string('bank_charge')->nullable();
            $table->string('offer_validity')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('importer_account_name')->nullable();
            $table->string('importer_account_no')->nullable();
            $table->string('importer_bank_branch')->nullable();
            $table->string('importer_bank_country')->nullable();
            $table->longText('remark')->nullable();
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
        Schema::dropIfExists('sales_contracts');
    }
}
