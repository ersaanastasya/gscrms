<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'capital',
        'region',
        'subregion',
        'currency',
        'currency_code',
        'latitude',
        'longitude',
        'flag',
    ];

    protected $casts = [
        'latitude' => 'double',
        'longitude' => 'double',
    ];

    /**
     * Country has many statistics.
     */
    public function statistics(): HasMany
    {
        return $this->hasMany(CountryStatistic::class);
    }

    /**
     * Country has many ports.
     */
    public function ports(): HasMany
    {
        return $this->hasMany(Port::class);
    }

    /**
     * Country has many weather cache records.
     */
    public function weatherCaches(): HasMany
    {
        return $this->hasMany(WeatherCache::class);
    }

    /**
     * Country has many favorites.
     */
    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class);
    }

    /**
     * Country has many risk scores.
     */
    public function riskScores(): HasMany
    {
        return $this->hasMany(RiskScore::class);
    }
}