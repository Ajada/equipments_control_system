<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRentedEquipments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rented_equipments', function (Blueprint $table) {
            $table->id();
            $table->string('equipment_name');
            $table->string('identifier_code');
            $table->string('company');
            $table->string('unity');
            $table->date('start_rent');
            $table->date('end_rent');
            $table->integer('rental_period');
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
        Schema::dropIfExists('rented_equipments');
    }
}
