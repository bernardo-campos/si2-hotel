<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->string('habitacion_numero', 5); // room_number
            $table->string('numero_tarjeta', 18)->nullable(); // card_number
            $table->date('fecha_checkin'); // checkin
            $table->date('fecha_checkout')->nullable(); // checkout
            $table->foreignId('usuario_id')->constrained(); // DNI_Huesped // user_id
            $table->unsignedTinyInteger('cantidad_personas')->nullable(); // people
            $table->string('servicios_adicionales')->nullable(); // aditional_services
            $table->string('estado')->nullable(); // status
            $table->float('seña')->nullable(); // advance
            $table->float('precio')->nullable(); // price
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
        Schema::dropIfExists('reservations');
    }
}
