<?php

namespace Database\Seeders;

use App\Models\RiskScore;
use Illuminate\Database\Seeder;

class RiskScoreSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        RiskScore::insert([
            [
                'shipment_id' => 1,
                'country_id' => 1,
                'weather_score' => 20,
                'currency_score' => 10,
                'news_score' => 15,
                'total_score' => 45,
                'risk_level' => 'Low',
                'description' => 'Shipment is on schedule. Continue monitoring.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'shipment_id' => 2,
                'country_id' => 2,
                'weather_score' => 30,
                'currency_score' => 15,
                'news_score' => 20,
                'total_score' => 65,
                'risk_level' => 'Medium',
                'description' => 'Monitor vessel movement and weather conditions.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'shipment_id' => 3,
                'country_id' => 3,
                'weather_score' => 10,
                'currency_score' => 5,
                'news_score' => 10,
                'total_score' => 25,
                'risk_level' => 'Low',
                'description' => 'Shipment has arrived safely.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'shipment_id' => 4,
                'country_id' => 4,
                'weather_score' => 40,
                'currency_score' => 25,
                'news_score' => 20,
                'total_score' => 85,
                'risk_level' => 'High',
                'description' => 'High risk detected. Review departure schedule.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'shipment_id' => 5,
                'country_id' => 5,
                'weather_score' => 45,
                'currency_score' => 20,
                'news_score' => 30,
                'total_score' => 95,
                'risk_level' => 'Critical',
                'description' => 'Immediate action required due to severe delay and weather conditions.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
    
}