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
            //Shipping Info
            $table->unsignedInteger('export_buyer_id')->nullable();
            $table->enum('port_of_loading',['By Air','By Sea','By Road','By Rail'])->default('By Air');
            $table->string('pre_carring_by')->nullable();
            $table->string('port_of_discharge')->nullable();
            $table->string('final_destination')->nullable();
            $table->dateTime('shipment_date')->nullable();
            $table->string('packaging_responsibility',['Globe Fisheries Ltd','Buyer'])->default('Globe Fisheries Ltd');
            $table->boolean('partial_shipment')->default(0);
            $table->boolean('trans_shipment')->default(0);
            $table->enum('shipping_responsibility',['FOB','CFR','CIF'])->default('FOB');
            $table->integer('cfr_rate')->nullable();
            $table->integer('cif_rate')->nullable();
            $table->longText('shipment_remark')->nullable();
            //Payment Info
            $table->enum('payment_method',['T.T at Sight','T.T in Advance','L.C at Sight'])->default('T.T at Sight');
            $table->double('grand_total')->nullable();
            $table->double('paid_in_percentage')->nullable();
            $table->double('paid_in_amount')->nullable();
            $table->double('due_amount')->nullable();
            $table->unsignedInteger('advising_bank')->nullable();
            $table->string('advising_bank_account_no')->nullable();
            $table->string('advising_bank_swift_code')->nullable();
            $table->string('bank_charge')->nullable();
            $table->string('offer_validity')->nullable();
            //Importer Bank Info
            $table->string('bank_name')->nullable();
            $table->string('importer_account_name')->nullable();
            $table->string('importer_account_no')->nullable();
            $table->string('importer_bank_branch')->nullable();
            $table->string('importer_bank_country')->nullable();
            $table->longText('remark')->nullable();
            $table->enum('status',['Initial','Pending','Approved'])->default('Initial');
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
