<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('customer_id')->nullable();
            $table->enum('status', ['Pending', 'Confirm','Delivered', 'Cancel','DeliverySuccess','Returned'])->default('Pending');
            $table->string('remark')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('trx_number')->nullable();
            $table->string('trx_id')->nullable();
            $table->integer('paid_amount')->nullable();
            $table->integer('due_amount')->nullable();
            $table->integer('total_discount')->nullable();
            $table->integer('delivery_charge')->nullable();
            $table->string('cancelMassage')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
