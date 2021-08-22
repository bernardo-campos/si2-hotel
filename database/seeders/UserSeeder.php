<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'John Doe',
            'email' => 'administrador@hotel.com',
            'password' => '$2y$10$.dye67Tr2ElyFsIGg8rg6u28VBn22SOZ/iq7KrlytmvZiKKTHEFqu', // password
        ])->assignRole('Administrador');

        $encargado = User::create([
            'name' => 'Jane Doe',
            'email' => 'encargado@hotel.com',
            'password' => '$2y$10$.dye67Tr2ElyFsIGg8rg6u28VBn22SOZ/iq7KrlytmvZiKKTHEFqu', // password
        ])->assignRole('Encargado');

        $user = User::create([
            'name' => 'Johnny Doe',
            'email' => 'cliente@hotel.com',
            'password' => '$2y$10$.dye67Tr2ElyFsIGg8rg6u28VBn22SOZ/iq7KrlytmvZiKKTHEFqu', // password
        ])->assignRole('Cliente');

    }
}
