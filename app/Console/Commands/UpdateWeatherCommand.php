<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Country;
use App\Services\WeatherService;

class UpdateWeatherCommand extends Command
{
    /**
     * Nama command
     */
    protected $signature = 'weather:update';

    /**
     * Deskripsi command
     */
    protected $description = 'Update weather data for all countries';

    public function handle(WeatherService $weatherService)
    {
        $countries = Country::all();

        foreach ($countries as $country) {

            if (!$country->capital) {
                continue;
            }

            $this->info("Updating {$country->name}...");

            $weatherService->updateCountryWeather($country);

            sleep(1); // jeda agar tidak terlalu banyak request
        }

        $this->info('Weather update completed.');

        return self::SUCCESS;
    }
}