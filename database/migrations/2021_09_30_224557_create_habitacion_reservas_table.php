<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabitacionReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitacion_reservas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('habitacion_id')->constrained();
            $table->foreignId('reserva_id')->constrained();
            $table->enum('estado', ['guardada', 'eliminada'])->default('guardada');
            $table->unsignedTinyInteger('cantidad_cunas')->default(0);
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
        Schema::dropIfExists('habitacion_reservas');
    }
}
