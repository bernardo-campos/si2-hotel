<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');                   // name
            $table->string('apellido')->nullable();     // surname
            $table->string('telefono')->nullable();     // phone
            $table->string('celular')->nullable();      // celphone
            $table->string('domicilio')->nullable();    // address
            $table->date('fecha_nacimiento')->nullable();  // birthdate
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
        Schema::dropIfExists('personas');
    }
}
