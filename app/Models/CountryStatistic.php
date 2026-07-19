<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CountryStatistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id',
        'population',
        'area',
        'gdp',
        'inflation',
        'unemployment',
        'updated_date',
    ];

    protected $casts = [
        'population' => 'integer',
        'area' => 'decimal:2',
        'gdp' => 'decimal:2',
        'inflation' => 'decimal:2',
        'unemployment' => 'decimal:2',
        'updated_date' => 'date',
    ];

    /**
     * Statistic belongs to one country.
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}