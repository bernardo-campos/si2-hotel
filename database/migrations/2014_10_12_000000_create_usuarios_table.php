<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('dni', 8)->unique();
            $table->string('nombre');                   // name
            $table->string('apellido')->nullable();     // surname
            $table->string('telefono')->nullable();     // phone
            $table->string('celular')->nullable();      // celphone
            $table->string('domicilio')->nullable();    // address
            $table->date('fecha_nacimiento')->nullable();  // birthdate
            $table->string('email')->unique();          // email
            // $table->timestamp('email_verified_at')->nullable(); // email_verified_at
            $table->string('contraseña');               // password
            // $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
