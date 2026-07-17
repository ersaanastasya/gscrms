<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiskScore extends Model
{
    use HasFactory;

    protected $table = 'risk_scores';

    protected $fillable = [

        'country_id',

        'weather_score',

        'inflation_score',

        'currency_score',

        'news_score',

        'total_score',

        'risk_level',

        'calculated_at'

    ];

    protected $casts = [

        'weather_score' => 'decimal:2',

        'inflation_score' => 'decimal:2',

        'currency_score' => 'decimal:2',

        'news_score' => 'decimal:2',

        'total_score' => 'decimal:2',

        'calculated_at' => 'datetime',

    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}