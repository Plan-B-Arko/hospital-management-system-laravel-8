<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosisTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosis_tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('diagnosis_category_id');
            $table->string('report_number');
            $table->integer('age');
            $table->integer('height');
            $table->integer('weight');
            $table->string('average_glucose');
            $table->string('urine_sugar');
            $table->string('blood_pressure');
            $table->string('diabetes');
            $table->integer('cholesterol');
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
        Schema::dropIfExists('diagnosis_tests');
    }
}
