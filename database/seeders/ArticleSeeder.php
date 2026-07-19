<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Article::insert([
            [
                'title' => 'Understanding Global Supply Chain',
                'slug' => 'understanding-global-supply-chain',
                'summary' => 'Introduction to global supply chain management.',
                'content' => 'Global supply chain is a worldwide network used to produce and deliver goods from suppliers to customers efficiently.',
                'author' => 'Administrator',
                'image' => 'articles/global-supply-chain.jpg',
                'status' => 'Published',
                'published_at' => now()->subDays(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'How Weather Affects Maritime Logistics',
                'slug' => 'how-weather-affects-maritime-logistics',
                'summary' => 'Weather impact on shipping operations.',
                'content' => 'Weather conditions such as storms and high waves can significantly affect shipping schedules and delivery performance.',
                'author' => 'Administrator',
                'image' => 'articles/weather-logistics.jpg',
                'status' => 'Published',
                'published_at' => now()->subDays(8),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Top 5 Largest Container Ports in the World',
                'slug' => 'top-5-largest-container-ports',
                'summary' => 'Overview of the busiest ports worldwide.',
                'content' => 'Container ports such as Shanghai, Singapore, and Ningbo play a major role in global trade and logistics.',
                'author' => 'Administrator',
                'image' => 'articles/top-ports.jpg',
                'status' => 'Published',
                'published_at' => now()->subDays(6),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Reducing Risk in International Shipping',
                'slug' => 'reducing-risk-in-international-shipping',
                'summary' => 'Managing shipping risks effectively.',
                'content' => 'Risk management includes monitoring weather, geopolitical events, and port congestion to minimize shipment delays.',
                'author' => 'Administrator',
                'image' => 'articles/risk-management.jpg',
                'status' => 'Published',
                'published_at' => now()->subDays(4),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Digital Transformation in Logistics',
                'slug' => 'digital-transformation-in-logistics',
                'summary' => 'Technology trends in logistics.',
                'content' => 'Modern logistics increasingly relies on digital platforms, AI, IoT, and real-time tracking to improve efficiency.',
                'author' => 'Administrator',
                'image' => 'articles/digital-logistics.jpg',
                'status' => 'Published',
                'published_at' => now()->subDays(2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}