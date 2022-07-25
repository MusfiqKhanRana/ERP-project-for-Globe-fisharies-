<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExportBuyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('export_buyers', function (Blueprint $table) {
            $table->id();
            $table->integer('buyer_code')->nullable();
            $table->string('buyer_name')->nullable();
            $table->string('buyer_address')->nullable();
            $table->integer('buyer_contact_number')->nullable();
            $table->string('buyer_email')->nullable();
            $table->string('buyer_country')->nullable();
            $table->string('consignee_name')->nullable();
            $table->string('consignee_address')->nullable();
            $table->integer('consignee_contact_number')->nullable();
            $table->string('consignee_email')->nullable();
            $table->string('consignee_country')->nullable();
            $table->string('notify_party_name')->nullable();
            $table->string('notify_party_address')->nullable();
            $table->integer('notify_party_contact')->nullable();
            $table->string('notify_party_email')->nullable();
            $table->string('notify_party_country')->nullable();
            $table->text('bank_details')->nullable();
            $table->text('assign_hs_code')->nullable();
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
        Schema::dropIfExists('export_buyers');
    }
}
