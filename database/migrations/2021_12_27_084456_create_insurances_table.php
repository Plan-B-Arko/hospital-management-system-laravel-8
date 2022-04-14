<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurances', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('service_tax')->nullable();
            $table->integer('discount')->nullable();
            $table->text('remark')->nullable();
            $table->string('insurance_no')->nullable();
            $table->string('insurance_code')->nullable();
            $table->string('hospital_rate')->nullable();
            $table->string('insurance_rate')->nullable();
            $table->string('total')->nullable();
            $table->string('status')->default(1);
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
        Schema::dropIfExists('insurances');
    }
}
