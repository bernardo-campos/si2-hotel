<?php

namespace Database\Seeders;

use App\Models\Person;
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
        $admin = Person::create([
            'name' => 'John Doe',
            'dni' => '12345677',
        ])->user()->save(
            new User([
                'email' => 'administrador@hotel.com',
                'password' => '$2y$10$.dye67Tr2ElyFsIGg8rg6u28VBn22SOZ/iq7KrlytmvZiKKTHEFqu', // password
            ])
        )->assignRole('Administrador'); // over user returned by save() method

        $encargado = Person::create([
            'name' => 'Jane Doe',
            'dni' => '12345678',
        ])->user()->save(
            new User([
                'email' => 'encargado@hotel.com',
                'password' => '$2y$10$.dye67Tr2ElyFsIGg8rg6u28VBn22SOZ/iq7KrlytmvZiKKTHEFqu', // password
            ])
        )->assignRole('Encargado'); // over user returned by save() method

        $user = Person::create([
            'name' => 'Johnny Doe',
            'dni' => '12345679',
        ])->user()->save(
            new User([
                'email' => 'cliente@hotel.com',
                'password' => '$2y$10$.dye67Tr2ElyFsIGg8rg6u28VBn22SOZ/iq7KrlytmvZiKKTHEFqu', // password
            ])
        )->assignRole('Cliente'); // over user returned by save() method

    }
}
