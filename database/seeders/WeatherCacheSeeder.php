<?php

namespace Database\Seeders;

use App\Models\WeatherCache;
use Illuminate\Database\Seeder;

class WeatherCacheSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        WeatherCache::insert([
            [
                'country_id' => 1,
                'city' => 'Jakarta',
                'temperature' => 30.50,
                'humidity' => 78,
                'wind_speed' => 12.40,
                'weather_condition' => 'Cloudy',
                'api_response' => json_encode([
                    'status' => 'success',
                    'source' => 'OpenWeather'
                ]),
                'cached_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'country_id' => 2,
                'city' => 'Singapore',
                'temperature' => 31.20,
                'humidity' => 82,
                'wind_speed' => 9.60,
                'weather_condition' => 'Sunny',
                'api_response' => json_encode([
                    'status' => 'success',
                    'source' => 'OpenWeather'
                ]),
                'cached_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'country_id' => 3,
                'city' => 'Shanghai',
                'temperature' => 27.80,
                'humidity' => 70,
                'wind_speed' => 15.20,
                'weather_condition' => 'Rain',
                'api_response' => json_encode([
                    'status' => 'success',
                    'source' => 'OpenWeather'
                ]),
                'cached_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'country_id' => 4,
                'city' => 'Tokyo',
                'temperature' => 25.60,
                'humidity' => 68,
                'wind_speed' => 10.10,
                'weather_condition' => 'Clear',
                'api_response' => json_encode([
                    'status' => 'success',
                    'source' => 'OpenWeather'
                ]),
                'cached_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'country_id' => 5,
                'city' => 'Los Angeles',
                'temperature' => 28.40,
                'humidity' => 60,
                'wind_speed' => 7.80,
                'weather_condition' => 'Sunny',
                'api_response' => json_encode([
                    'status' => 'success',
                    'source' => 'OpenWeather'
                ]),
                'cached_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}