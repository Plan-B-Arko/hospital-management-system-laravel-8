<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apointments', function (Blueprint $table) {
            $table->id();
            $table->text('appointment_id');
            $table->text('patient_id');
            $table->unsignedBigInteger('doctorDept_id');
            $table->unsignedBigInteger('doctor_id');
            $table->date('appointment_date');
            $table->string('serial_no');
            $table->text('problem');
            $table->string('status');
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
        Schema::dropIfExists('apointments');
    }
}
