<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulelistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedulelists', function (Blueprint $table) {
            $table->id();
            $table->string('slot_id');
            $table->string('doctor_id');
            $table->string('available_days');
            $table->string('available_time_start');
            $table->string('available_time_end');
            $table->string('per_patient_time');
            $table->string('serial_visiability');
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
        Schema::dropIfExists('schedulelists');
    }
}
