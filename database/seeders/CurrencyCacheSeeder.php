<?php

namespace Database\Seeders;

use App\Models\CurrencyCache;
use Illuminate\Database\Seeder;

class CurrencyCacheSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        CurrencyCache::insert([
            [
                'base_currency' => 'USD',
                'target_currency' => 'IDR',
                'exchange_rate' => 16500.250000,
                'api_response' => json_encode([
                    'provider' => 'ExchangeRate API',
                    'status' => 'success'
                ]),
                'cached_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'base_currency' => 'USD',
                'target_currency' => 'SGD',
                'exchange_rate' => 1.350000,
                'api_response' => json_encode([
                    'provider' => 'ExchangeRate API',
                    'status' => 'success'
                ]),
                'cached_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'base_currency' => 'USD',
                'target_currency' => 'CNY',
                'exchange_rate' => 7.180000,
                'api_response' => json_encode([
                    'provider' => 'ExchangeRate API',
                    'status' => 'success'
                ]),
                'cached_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'base_currency' => 'USD',
                'target_currency' => 'JPY',
                'exchange_rate' => 157.450000,
                'api_response' => json_encode([
                    'provider' => 'ExchangeRate API',
                    'status' => 'success'
                ]),
                'cached_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'base_currency' => 'USD',
                'target_currency' => 'EUR',
                'exchange_rate' => 0.920000,
                'api_response' => json_encode([
                    'provider' => 'ExchangeRate API',
                    'status' => 'success'
                ]),
                'cached_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}