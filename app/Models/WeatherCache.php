<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WeatherCache extends Model
{
    use HasFactory;

    protected $table = 'weather_cache';

    /**
     * Mass Assignment
     */
    protected $fillable = [
        'country_id',
        'city',
        'temperature',
        'humidity',
        'wind_speed',
        'weather_condition',
        'api_response',
        'cached_at',
    ];

    /**
     * Attribute Casting
     */
    protected $casts = [
        'temperature' => 'decimal:2',
        'wind_speed' => 'decimal:2',
        'humidity' => 'integer',
        'cached_at' => 'datetime',
    ];

    /**
     * Weather Cache belongs to one Country.
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}