<?php

namespace Database\Seeders;

use App\Models\NewsCache;
use Illuminate\Database\Seeder;

class NewsCacheSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        NewsCache::insert([
            [
                'title' => 'Port of Singapore Operates Normally',
                'source' => 'Reuters',
                'url' => 'https://example.com/news/port-singapore',
                'published_at' => now()->subHours(6),
                'summary' => 'Port operations remain stable with no significant congestion reported.',
                'content' => 'Port operations remain stable with no significant congestion reported. Maritime activities continue as scheduled and no major disruptions have been recorded.',
                'api_response' => json_encode([
                    'provider' => 'News API',
                    'status' => 'success',
                ]),
                'cached_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Heavy Storm Causes Shipping Delays',
                'source' => 'BBC News',
                'url' => 'https://example.com/news/heavy-storm',
                'published_at' => now()->subHours(10),
                'summary' => 'Extreme weather conditions delay several international cargo vessels.',
                'content' => 'Extreme weather conditions delay several international cargo vessels due to heavy storms and high sea waves affecting shipping routes.',
                'api_response' => json_encode([
                    'provider' => 'News API',
                    'status' => 'success',
                ]),
                'cached_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Shanghai Port Handles Record Container Volume',
                'source' => 'Bloomberg',
                'url' => 'https://example.com/news/shanghai-port',
                'published_at' => now()->subDay(),
                'summary' => 'Container throughput reaches a new record this quarter.',
                'content' => 'Shanghai Port successfully handled a record number of containers this quarter, strengthening its position as one of the busiest ports in the world.',
                'api_response' => json_encode([
                    'provider' => 'News API',
                    'status' => 'success',
                ]),
                'cached_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Labor Strike Affects Port Operations',
                'source' => 'CNBC',
                'url' => 'https://example.com/news/labor-strike',
                'published_at' => now()->subHours(18),
                'summary' => 'Labor strike temporarily disrupts loading and unloading activities.',
                'content' => 'A labor strike temporarily disrupted loading and unloading activities, causing shipment delays at several international ports.',
                'api_response' => json_encode([
                    'provider' => 'News API',
                    'status' => 'success',
                ]),
                'cached_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Global Supply Chain Shows Signs of Recovery',
                'source' => 'Financial Times',
                'url' => 'https://example.com/news/supply-chain-recovery',
                'published_at' => now()->subDays(2),
                'summary' => 'International logistics performance continues to improve across major ports.',
                'content' => 'International logistics performance continues to improve across major ports, indicating a gradual recovery of the global supply chain.',
                'api_response' => json_encode([
                    'provider' => 'News API',
                    'status' => 'success',
                ]),
                'cached_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}