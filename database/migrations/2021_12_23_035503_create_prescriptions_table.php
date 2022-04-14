<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('outlet_id');
            $table->string('patient_id');
            $table->string('patient_name')->nullable();
            $table->string('sex')->nullable();
            $table->date('dob')->nullable();
            $table->integer('weight')->nullable();
            $table->string('blood_pressure')->nullable();
            $table->string('reference')->nullable();
            $table->string('type')->nullable();
            $table->string('appointment_id')->nullable();
            $table->date('date')->nullable();
            $table->string('hospital_name')->nullable();
            $table->string('address')->nullable();
            $table->string('visiting_fees')->nullable();
            $table->string('patient_notes')->nullable();
            $table->string('cheif_complain')->nullable();
            $table->string('insurance')->nullable();

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
        Schema::dropIfExists('prescriptions');
    }
}
