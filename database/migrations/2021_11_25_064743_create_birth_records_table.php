<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBirthRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('birth_records', function (Blueprint $table) {
            $table->id();
            $table->string('child_name');
            $table->string('gender');
            $table->integer('weight');
            $table->string('child_photo');
            $table->dateTime('birth_date');
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_photo')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_photo')->nullable();
            $table->string('report')->nullable();
            $table->string('attach_document_photo')->nullable();
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
        Schema::dropIfExists('birth_records');
    }
}
