<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_prescriptions', function (Blueprint $table) {
            $table->id();
            $table->string('prescription_id')->nullable();
            $table->string('medicine_name')->nullable();
             $table->string('medicine_type')->nullable();
             $table->string('medicine_instruction')->nullable();
              $table->string('days')->nullable();
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
        Schema::dropIfExists('medicine_prescriptions');
    }
}
