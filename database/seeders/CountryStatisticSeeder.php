<?php

namespace Database\Seeders;

use App\Models\CountryStatistic;
use Illuminate\Database\Seeder;

class CountryStatisticSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        CountryStatistic::insert([
            [
                'country_id' => 1,
                'population' => 281000000,
                'area' => 1904569.00,
                'gdp' => 1540.00,
                'inflation' => 2.80,
                'unemployment' => 5.20,
                'updated_date' => now()->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'country_id' => 2,
                'population' => 6000000,
                'area' => 734.30,
                'gdp' => 530.00,
                'inflation' => 2.40,
                'unemployment' => 2.10,
                'updated_date' => now()->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'country_id' => 3,
                'population' => 1410000000,
                'area' => 9596961.00,
                'gdp' => 17700.00,
                'inflation' => 0.90,
                'unemployment' => 5.10,
                'updated_date' => now()->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'country_id' => 4,
                'population' => 124000000,
                'area' => 377975.00,
                'gdp' => 4210.00,
                'inflation' => 2.70,
                'unemployment' => 2.60,
                'updated_date' => now()->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'country_id' => 5,
                'population' => 340000000,
                'area' => 9833517.00,
                'gdp' => 29170.00,
                'inflation' => 3.30,
                'unemployment' => 4.10,
                'updated_date' => now()->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}