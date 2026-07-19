<?php

namespace Database\Seeders;

use App\Models\ShipmentPosition;
use Illuminate\Database\Seeder;

class ShipmentPositionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        ShipmentPosition::insert([
            [
                'shipment_id' => 1,
                'current_location' => 'Java Sea',
                'latitude' => -5.900000,
                'longitude' => 108.500000,
                'description' => 'Vessel is sailing from Jakarta to Singapore.',
                'position_time' => now()->subHours(2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'shipment_id' => 2,
                'current_location' => 'South China Sea',
                'latitude' => 8.500000,
                'longitude' => 110.300000,
                'description' => 'Vessel is on schedule toward Shanghai.',
                'position_time' => now()->subHours(1),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'shipment_id' => 3,
                'current_location' => 'Port of Tokyo',
                'latitude' => 35.657900,
                'longitude' => 139.796600,
                'description' => 'Shipment has arrived at destination.',
                'position_time' => now()->subDay(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'shipment_id' => 4,
                'current_location' => 'Port of Tokyo',
                'latitude' => 35.657900,
                'longitude' => 139.796600,
                'description' => 'Container is waiting for departure.',
                'position_time' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'shipment_id' => 5,
                'current_location' => 'Pacific Ocean',
                'latitude' => 28.500000,
                'longitude' => -145.000000,
                'description' => 'Shipment delayed due to bad weather.',
                'position_time' => now()->subHours(4),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}