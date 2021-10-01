<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabitacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitaciones', function (Blueprint $table) {
            $table->id();
            $table->string('numero', 5); // number
            $table->boolean('tiene_tv')->default(true); // has_tv
            $table->boolean('tiene_frigobar')->default(true); // has_minibar
            $table->boolean('tiene_aac')->default(true); // has_ac
            $table->unsignedTinyInteger('camas_dobles')->default(0); // double_beds
            $table->unsignedTinyInteger('camas_simples')->default(0); // single_beds
            $table->float('precio'); // price
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
