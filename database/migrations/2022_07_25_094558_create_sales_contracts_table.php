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
            $table->string('port_of_loading')->nullable();
            $table->enum('pre_carring_by',['By Air','By Sea','By Road','By Rail'])->default('By Air');
            $table->string('port_of_discharge')->nullable();
            $table->string('final_destination')->nullable();
            $table->dateTime('shipment_date')->nullable();
            $table->enum('packaging_responsibility',['Globe Fisheries Ltd','Buyer'])->default('Globe Fisheries Ltd');
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
            $table->unsignedInteger('advising_bank_id')->nullable();
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
            $table->enum('commercial_status',['Pending','Approved'])->default('Pending');
            $table->enum('packing_status',['Pending','Approved','RequestApproval'])->default('Pending');
            $table->boolean('packing_request_approval')->nullable();
            //Commercial Invoice
            $table->string('exp_no')->nullable();
            $table->date('exp_date')->nullable();
            $table->string('cbm')->nullable();
            $table->date('production_date')->nullable();
            $table->double('net_weight')->nullable();
            $table->double('gross_weight')->nullable();
            //Packing Production Date
            $table->date('packing_production_date')->nullable();
            $table->double('packing_gross_weight')->nullable();
            $table->date('expiry_date')->nullable();
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
