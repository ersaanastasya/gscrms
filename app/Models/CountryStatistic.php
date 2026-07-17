<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryStatistic extends Model
{
    use HasFactory;

    protected $table = 'country_statistics';

    protected $fillable = [

        'country_id',

        'gdp',

        'gdp_growth',

        'inflation',

        'unemployment',

        'population',

        'population_growth',

        'exports',

        'imports',

        'data_year',

        'last_synced_at'

    ];

    protected $casts = [

        'gdp' => 'decimal:2',

        'gdp_growth' => 'decimal:2',

        'inflation' => 'decimal:2',

        'unemployment' => 'decimal:2',

        'population' => 'integer',

        'population_growth' => 'decimal:2',

        'exports' => 'decimal:2',

        'imports' => 'decimal:2',

        'last_synced_at' => 'datetime',

    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}