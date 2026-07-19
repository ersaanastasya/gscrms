<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            CountrySeeder::class,
            CountryStatisticSeeder::class,
            PortSeeder::class,
            ShipmentSeeder::class,
            ShipmentPositionSeeder::class,
            WeatherCacheSeeder::class,
            CurrencyCacheSeeder::class,
            NewsCacheSeeder::class,
            RiskScoreSeeder::class,
            FavoriteSeeder::class,
            PositiveWordSeeder::class,
            NegativeWordSeeder::class,
            SettingSeeder::class,
            ArticleSeeder::class,
        ]);
    }
}