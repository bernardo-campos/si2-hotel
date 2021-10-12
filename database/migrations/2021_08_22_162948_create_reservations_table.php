<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->date('checkin');
            $table->date('checkout')->nullable();
            $table->foreignId('user_id')->constrained(); // DNI_Huesped
            $table->unsignedTinyInteger('people_qty')->nullable();
            $table->string('aditional_services')->nullable();
            $table->string('status')->nullable();
            $table->float('advance')->nullable();
            $table->float('price')->nullable();
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
        Schema::dropIfExists('reservations');
    }
}
