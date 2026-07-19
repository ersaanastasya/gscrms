<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Setting::insert([
            [
                'setting_key' => 'app_name',
                'setting_value' => 'Global Supply Chain Risk Monitoring',
                'description' => 'Application name',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'setting_key' => 'default_currency',
                'setting_value' => 'USD',
                'description' => 'Default currency',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'setting_key' => 'weather_cache_duration',
                'setting_value' => '60',
                'description' => 'Weather cache duration (minutes)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'setting_key' => 'news_cache_duration',
                'setting_value' => '30',
                'description' => 'News cache duration (minutes)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'setting_key' => 'currency_cache_duration',
                'setting_value' => '120',
                'description' => 'Currency cache duration (minutes)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'setting_key' => 'risk_threshold_low',
                'setting_value' => '40',
                'description' => 'Maximum score for Low Risk',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'setting_key' => 'risk_threshold_medium',
                'setting_value' => '70',
                'description' => 'Maximum score for Medium Risk',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'setting_key' => 'risk_threshold_high',
                'setting_value' => '90',
                'description' => 'Maximum score for High Risk',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'setting_key' => 'system_email',
                'setting_value' => 'admin@globalsupplychain.com',
                'description' => 'System administrator email',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'setting_key' => 'maintenance_mode',
                'setting_value' => 'false',
                'description' => 'Maintenance mode status',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}