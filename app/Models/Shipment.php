<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Shipment extends Model
{
    use HasFactory;

    /**
     * Mass Assignment
     */
    protected $fillable = [
        'tracking_number',
        'origin_port_id',
        'destination_port_id',
        'vessel_name',
        'container_number',
        'status',
        'departure_date',
        'estimated_arrival',
        'arrival_date',
    ];

    /**
     * Attribute Casting
     */
    protected $casts = [
        'departure_date' => 'date',
        'estimated_arrival' => 'date',
        'arrival_date' => 'date',
    ];

    /**
     * Shipment belongs to one Origin Port.
     */
    public function originPort(): BelongsTo
    {
        return $this->belongsTo(Port::class, 'origin_port_id');
    }

    /**
     * Shipment belongs to one Destination Port.
     */
    public function destinationPort(): BelongsTo
    {
        return $this->belongsTo(Port::class, 'destination_port_id');
    }

    /**
     * Shipment has many tracking positions.
     */
    public function positions(): HasMany
    {
        return $this->hasMany(ShipmentPosition::class);
    }

    /**
     * Shipment has one risk score.
     */
    public function riskScore(): HasOne
    {
        return $this->hasOne(RiskScore::class);
    }

    /**
     * Shipment has many favorites.
     */
    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class);
    }
}