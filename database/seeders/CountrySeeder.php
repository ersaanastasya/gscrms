<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = database_path('data/countries.json');

        if (!file_exists($path)) {
            $this->command->error("countries.json tidak ditemukan di database/data/");
            return;
        }

        $countries = json_decode(file_get_contents($path), true);

        foreach ($countries as $country) {

            // Currency
            $currencyCode = null;
            $currencyName = null;

            if (!empty($country['currencies'])) {
                $currencyCode = array_key_first($country['currencies']);
                $currencyName = $country['currencies'][$currencyCode]['name'] ?? null;
            }

            // Capital
            $capital = null;
            if (!empty($country['capital'])) {
                $capital = $country['capital'][0];
            }

            // Latitude & Longitude
            $latitude = null;
            $longitude = null;

            if (!empty($country['latlng'])) {
                $latitude = $country['latlng'][0] ?? null;
                $longitude = $country['latlng'][1] ?? null;
            }

            Country::updateOrCreate(
                [
                    'code' => $country['cca2']
                ],
                [
                    'name'          => $country['name']['common'] ?? null,
                    'capital'       => $capital,
                    'region'        => $country['region'] ?? null,
                    'subregion'     => $country['subregion'] ?? null,
                    'currency'      => $currencyName,
                    'currency_code' => $currencyCode,
                    'latitude'      => $latitude,
                    'longitude'     => $longitude,
                    'flag'          => 'https://flagcdn.com/w320/' . strtolower($country['cca2']) . '.png',
                ]
            );
        }

        $this->command->info('====================================');
        $this->command->info('Countries imported successfully.');
        $this->command->info('====================================');
    }
}