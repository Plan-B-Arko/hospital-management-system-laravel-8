<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('outlet_id');
            $table->string('first_name1');
            $table->string('last_name1');
            $table->string('email');
            $table->string('password');
            $table->string('designation');
            $table->string('doc_dept');
            $table->integer('phone');
            $table->integer('mobile');
            $table->string('sex');
            $table->string('profile');

            $table->date('dob');
            $table->string('address1');
            $table->string('address12');
            $table->string('city');
            $table->string('zip');
            $table->string('specialist');
            $table->integer('age');
            $table->string('blood_group');
            $table->string('social_link');
            $table->string('image')->nullable();
            $table->string('career_title');
            $table->text('short_biography');
            $table->text('long_biography');
            $table->text('education_degree');
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
        Schema::dropIfExists('doctors');
    }
}
