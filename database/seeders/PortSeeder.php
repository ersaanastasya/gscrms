<?php

namespace Database\Seeders;

use App\Models\Port;
use Illuminate\Database\Seeder;

class PortSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Port::insert([
            [
                'country_id' => 1,
                'name' => 'Port of Tanjung Priok',
                'code' => 'IDTPP',
                'city' => 'Jakarta',
                'type' => 'Seaport',
                'latitude' => -6.104900,
                'longitude' => 106.886000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'country_id' => 2,
                'name' => 'Port of Singapore',
                'code' => 'SGSIN',
                'city' => 'Singapore',
                'type' => 'Seaport',
                'latitude' => 1.264400,
                'longitude' => 103.840500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'country_id' => 3,
                'name' => 'Port of Shanghai',
                'code' => 'CNSHA',
                'city' => 'Shanghai',
                'type' => 'Seaport',
                'latitude' => 31.230400,
                'longitude' => 121.473700,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'country_id' => 4,
                'name' => 'Port of Tokyo',
                'code' => 'JPTYO',
                'city' => 'Tokyo',
                'type' => 'Seaport',
                'latitude' => 35.657900,
                'longitude' => 139.796600,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'country_id' => 5,
                'name' => 'Port of Los Angeles',
                'code' => 'USLAX',
                'city' => 'Los Angeles',
                'type' => 'Seaport',
                'latitude' => 33.740500,
                'longitude' => -118.272800,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
    
}