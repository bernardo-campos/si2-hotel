<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('number', 5);
            $table->boolean('has_tv')->default(true);
            $table->boolean('has_minibar')->default(true);
            $table->boolean('has_ac')->default(true);
            $table->unsignedTinyInteger('double_beds')->default(0);
            $table->unsignedTinyInteger('single_beds')->default(0);
            $table->string('stauts')->nullable();
            $table->float('price');
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
        Schema::dropIfExists('rooms');
    }
}
