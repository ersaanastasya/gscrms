<?php

namespace App\Services;

use App\Models\Country;
use App\Models\WeatherCache;
use Illuminate\Support\Facades\Http;

class WeatherService
{
    protected string $apiKey;

    public function __construct()
    {
        $this->apiKey = env('WEATHER_API_KEY');
    }

    public function getCurrentWeather(string $city)
    {
        $response = Http::get('https://api.weatherapi.com/v1/current.json', [
            'key' => $this->apiKey,
            'q'   => $city,
            'aqi' => 'no',
        ]);

        if (!$response->successful()) {
            return null;
        }

        return $response->json();
    }

    public function updateCountryWeather(Country $country)
{
    $weather = $this->getCurrentWeather($country->capital);

    if (!$weather) {
        return false;
    }

    WeatherCache::updateOrCreate(
        [
            'country_id' => $country->id
        ],
        [
            'city' => $weather['location']['name'],
            'temperature' => $weather['current']['temp_c'],
            'humidity' => $weather['current']['humidity'],
            'wind_speed' => $weather['current']['wind_kph'],
            'weather_condition' => $weather['current']['condition']['text'],
            'api_response' => json_encode($weather),
            'cached_at' => now(),
        ]
    );

    return true;
}
}