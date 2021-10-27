<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::create([
            'number' => '101',
            'has_tv' => 1,
            'has_minibar' => 0,
            'has_ac' => 0,
            'double_beds' => 1,
            'single_beds' => 1,
            'price' => "1250.00",
        ]);

        Room::create([
            'number' => '102',
            'has_tv' => 1,
            'has_minibar' => 1,
            'has_ac' => 1,
            'double_beds' => 1,
            'single_beds' => 2,
            'price' => "1500.00",
        ]);

        Room::create([
            'number' => '103',
            'has_tv' => 1,
            'has_minibar' => 1,
            'has_ac' => 1,
            'double_beds' => 2,
            'single_beds' => 1,
            'price' => "3200.00",
        ]);

        Room::create([
            'number' => '104',
            'has_tv' => 1,
            'has_minibar' => 1,
            'has_ac' => 1,
            'double_beds' => 0,
            'single_beds' => 1,
            'price' => "990.00",
        ]);

        Room::create([
            'number' => '105',
            'has_tv' => 0,
            'has_minibar' => 0,
            'has_ac' => 0,
            'double_beds' => 0,
            'single_beds' => 2,
            'price' => "1025.00",
        ]);

        Room::create([
            'number' => '106',
            'has_tv' => 1,
            'has_minibar' => 0,
            'has_ac' => 1,
            'double_beds' => 1,
            'single_beds' => 0,
            'price' => "1200.00",
        ]);

        Room::create([
            'number' => '107',
            'has_tv' => 1,
            'has_minibar' => 0,
            'has_ac' => 0,
            'double_beds' => 0,
            'single_beds' => 1,
            'price' => "500.00",
        ]);

















































    }
}
