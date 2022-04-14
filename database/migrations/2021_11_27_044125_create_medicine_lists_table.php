<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicineListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_lists', function (Blueprint $table) {
            $table->id();
            $table->string('bar_code')->nullable();
            $table->string('medicine_name')->nullable();
            $table->string('strength')->nullable();
            $table->string('generic_name')->nullable();
            $table->string('box_size')->nullable();
            $table->string('unit')->nullable();
            $table->string('shelf')->nullable();
            $table->text('medicine_details')->nullable();
            $table->string('category')->nullable();
            $table->string('price')->nullable();
            $table->string('medicine_type')->nullable();
            $table->string('image')->nullable();
            $table->string('manufacturer')->nullable();
            $table->string('manufacturer_price')->nullable();
            $table->string('vat')->nullable();
            $table->string('igta')->nullable();
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
        Schema::dropIfExists('medicine_lists');
    }
}
