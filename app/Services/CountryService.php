<?php

namespace App\Services;

use App\Models\Country;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CountryService
{
    /**
     * REST Countries API
     */
    protected string $apiUrl = 'https://restcountries.com/v3.1';

    /**
     * Ambil semua negara
     */
    public function getAllCountries()
    {
        return Country::orderBy('country_name')->get();
    }

    /**
     * Ambil detail negara
     */
    public function getCountry(string $countryCode): ?Country
    {
        return Country::with([
            'statistics',
            'riskScore',
            'ports',
        ])
        ->where('country_code', strtoupper($countryCode))
        ->first();
    }

    /**
     * Cari negara
     */
    public function search(string $keyword)
    {
        return Country::where('country_name', 'like', "%{$keyword}%")
            ->orWhere('official_name', 'like', "%{$keyword}%")
            ->orderBy('country_name')
            ->get();
    }

    /**
     * Sinkronisasi negara dari REST Countries API
     */
    public function syncCountries(): int
    {
        $response = Http::timeout(60)
            ->get($this->apiUrl . '/all');

        if (!$response->successful()) {
            throw new \Exception('Failed to fetch countries.');
        }

        $countries = $response->json();

        $count = 0;

        foreach ($countries as $item) {

            /*
            |--------------------------------------------------------------------------
            | Currency
            |--------------------------------------------------------------------------
            */

            $currencyCode = null;
            $currencyName = null;

            if (
                isset($item['currencies']) &&
                is_array($item['currencies']) &&
                count($item['currencies']) > 0
            ) {

                $currencyCode = array_key_first($item['currencies']);

                if (
                    isset($item['currencies'][$currencyCode]['name'])
                ) {
                    $currencyName = $item['currencies'][$currencyCode]['name'];
                }
            }

            /*
            |--------------------------------------------------------------------------
            | Country
            |--------------------------------------------------------------------------
            */

            Country::updateOrCreate(

                [
                    'country_code' => $item['cca2'] ?? null,
                ],

                [

                    'country_name' => $item['name']['common'] ?? null,

                    'official_name' => $item['name']['official'] ?? null,

                    'capital' => $item['capital'][0] ?? null,

                    'region' => $item['region'] ?? null,

                    'subregion' => $item['subregion'] ?? null,

                    'latitude' => $item['latlng'][0] ?? null,

                    'longitude' => $item['latlng'][1] ?? null,

                    'flag_png' => $item['flags']['png'] ?? null,

                    'flag_svg' => $item['flags']['svg'] ?? null,

                    'currency_code' => $currencyCode,

                    'currency_name' => $currencyName,

                    'timezone' => $item['timezones'][0] ?? null,

                    'is_active' => true,

                ]

            );

            $count++;

        }

        Log::info("Country Sync Success : {$count}");

        return $count;
    }
}