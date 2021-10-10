<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationRoomPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_room_people', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reservation_room_id')->constrained();
            $table->string('dni', 8)->nullable();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
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
        Schema::dropIfExists('reservation_room_people');
    }
}
