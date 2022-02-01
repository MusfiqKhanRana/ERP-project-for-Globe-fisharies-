<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMicrobiologicalTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('microbiological_tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('coldstorage_id')->nullable();
            $table->string('spacies_type')->nullable();
            $table->string('size_count')->nullable();
            $table->dateTime('date_of_production')->nullable();
            $table->dateTime('date_of_collection')->nullable();
            $table->dateTime('date_of_test_inception')->nullable();
            $table->dateTime('date_of_test_completion')->nullable();
            $table->string('party_name')->nullable();
            $table->string('spc')->nullable();
            $table->string('coliform')->nullable();
            $table->string('faecal_coliform')->nullable();
            $table->string('staphylococcus_aureus')->nullable();
            $table->string('salmonella')->nullable();
            $table->string('vibrio_cholerae')->nullable();
            $table->longText('remark')->nullable();
            $table->longText('overall_remarks')->nullable();
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
        Schema::dropIfExists('microbiological_tests');
    }
}
