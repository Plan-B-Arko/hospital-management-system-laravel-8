<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewBedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_beds', function (Blueprint $table) {
            $table->id();
            $table->string('bed');
            $table->unsignedBigInteger('new_bed_type_id');
            $table->integer('charge');
            $table->text('description');

            $table->integer('status',1)->default(0);

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
        Schema::dropIfExists('new_beds');
    }
}
