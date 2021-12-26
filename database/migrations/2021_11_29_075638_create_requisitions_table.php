<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisitions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('warehouse_id')->nullable();
            $table->unsignedInteger('party_id')->nullable();
            $table->string('requisition_id')->nullable();
            $table->enum('status', ['Pending','Processing','Solved','Deliverd','Received','Returned','Imperfect'])->default('Pending');
            $table->longText('imperfect_massage')->nullable();
            $table->longText('resolve_massage')->nullable();
            $table->boolean('confirmed')->nullable();
            $table->dateTime('clearance_date')->nullable();
            $table->dateTime('process_date')->nullable();
            $table->dateTime('delivered_date')->nullable();
            $table->dateTime('return_date')->nullable();
            $table->dateTime('solve_date')->nullable();
            $table->text('return_note')->nullable();
            $table->unsignedInteger('submitted_by')->nullable();
            $table->unsignedInteger('created_by')->nullable();
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
        Schema::dropIfExists('requisitions');
    }
}
