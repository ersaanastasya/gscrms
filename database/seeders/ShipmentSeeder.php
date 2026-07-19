<?php

namespace Database\Seeders;

use App\Models\Shipment;
use Illuminate\Database\Seeder;

class ShipmentSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Shipment::insert([
            [
                'tracking_number' => 'GSC20260001',
                'origin_port_id' => 1,
                'destination_port_id' => 2,
                'vessel_name' => 'MV Nusantara',
                'container_number' => 'CONT001',
                'status' => 'In Transit',
                'departure_date' => now()->subDays(5),
                'estimated_arrival' => now()->addDays(2),
                'arrival_date' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tracking_number' => 'GSC20260002',
                'origin_port_id' => 2,
                'destination_port_id' => 3,
                'vessel_name' => 'MV Singapore Express',
                'container_number' => 'CONT002',
                'status' => 'Departed',
                'departure_date' => now()->subDays(3),
                'estimated_arrival' => now()->addDays(5),
                'arrival_date' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tracking_number' => 'GSC20260003',
                'origin_port_id' => 3,
                'destination_port_id' => 4,
                'vessel_name' => 'MV Pacific Ocean',
                'container_number' => 'CONT003',
                'status' => 'Arrived',
                'departure_date' => now()->subDays(10),
                'estimated_arrival' => now()->subDays(1),
                'arrival_date' => now()->subDay(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tracking_number' => 'GSC20260004',
                'origin_port_id' => 4,
                'destination_port_id' => 5,
                'vessel_name' => 'MV Sakura',
                'container_number' => 'CONT004',
                'status' => 'Pending',
                'departure_date' => now()->addDays(1),
                'estimated_arrival' => now()->addDays(10),
                'arrival_date' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tracking_number' => 'GSC20260005',
                'origin_port_id' => 5,
                'destination_port_id' => 1,
                'vessel_name' => 'MV Atlantic',
                'container_number' => 'CONT005',
                'status' => 'In Transit',
                'departure_date' => now()->subDays(7),
                'estimated_arrival' => now()->addDays(4),
                'arrival_date' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}