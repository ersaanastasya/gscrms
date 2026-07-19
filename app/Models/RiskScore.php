<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RiskScore extends Model
{
    use HasFactory;

    /**
     * Mass Assignment
     */
    protected $fillable = [
        'shipment_id',
        'weather_score',
        'news_score',
        'delay_score',
        'total_score',
        'risk_level',
        'recommendation',
        'calculated_at',
    ];

    /**
     * Attribute Casting
     */
    protected $casts = [
        'weather_score' => 'decimal:2',
        'news_score' => 'decimal:2',
        'delay_score' => 'decimal:2',
        'total_score' => 'decimal:2',
        'calculated_at' => 'datetime',
    ];

    /**
     * Risk Score belongs to one Shipment.
     */
    public function shipment(): BelongsTo
    {
        return $this->belongsTo(Shipment::class);
    }
}