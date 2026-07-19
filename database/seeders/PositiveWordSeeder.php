<?php

namespace Database\Seeders;

use App\Models\PositiveWord;
use Illuminate\Database\Seeder;

class PositiveWordSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        PositiveWord::insert([
            [
                'word' => 'stable',
                'weight' => 2.00,
                'description' => 'Indicates stable operations.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'word' => 'safe',
                'weight' => 2.50,
                'description' => 'Indicates safe shipping conditions.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'word' => 'improved',
                'weight' => 2.20,
                'description' => 'Shows operational improvement.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'word' => 'efficient',
                'weight' => 2.30,
                'description' => 'Represents efficient logistics.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'word' => 'recovered',
                'weight' => 2.40,
                'description' => 'Shows recovery from previous disruption.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'word' => 'normal',
                'weight' => 2.00,
                'description' => 'Operations are running normally.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'word' => 'smooth',
                'weight' => 2.10,
                'description' => 'Shipment movement is smooth.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'word' => 'success',
                'weight' => 2.50,
                'description' => 'Indicates successful operation.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'word' => 'growth',
                'weight' => 2.30,
                'description' => 'Positive growth indicator.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'word' => 'optimized',
                'weight' => 2.60,
                'description' => 'Optimized logistics process.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}