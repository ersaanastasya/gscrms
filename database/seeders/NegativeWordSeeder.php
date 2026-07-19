<?php

namespace Database\Seeders;

use App\Models\NegativeWord;
use Illuminate\Database\Seeder;

class NegativeWordSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        NegativeWord::insert([
            [
                'word' => 'delay',
                'weight' => 2.50,
                'description' => 'Indicates shipment delay.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'word' => 'storm',
                'weight' => 3.00,
                'description' => 'Severe weather conditions.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'word' => 'accident',
                'weight' => 3.20,
                'description' => 'Transportation accident.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'word' => 'congestion',
                'weight' => 2.80,
                'description' => 'Port congestion.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'word' => 'strike',
                'weight' => 3.00,
                'description' => 'Labor strike affecting operations.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'word' => 'disruption',
                'weight' => 2.90,
                'description' => 'Operational disruption.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'word' => 'damage',
                'weight' => 3.10,
                'description' => 'Cargo or vessel damage.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'word' => 'crisis',
                'weight' => 3.30,
                'description' => 'Major logistics crisis.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'word' => 'conflict',
                'weight' => 3.20,
                'description' => 'Political or regional conflict.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'word' => 'cancelled',
                'weight' => 2.70,
                'description' => 'Shipment or route cancellation.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}