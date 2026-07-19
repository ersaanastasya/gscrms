<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Port extends Model
{
    use HasFactory;

    /**
     * Mass Assignment
     */
    protected $fillable = [
        'country_id',
        'name',
        'code',
        'city',
        'type',
        'latitude',
        'longitude',
    ];

    /**
     * Attribute Casting
     */
    protected $casts = [
        'latitude' => 'double',
        'longitude' => 'double',
    ];

    /**
     * Port belongs to one Country.
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Shipments where this port is the origin.
     */
    public function originShipments(): HasMany
    {
        return $this->hasMany(Shipment::class, 'origin_port_id');
    }

    /**
     * Shipments where this port is the destination.
     */
    public function destinationShipments(): HasMany
    {
        return $this->hasMany(Shipment::class, 'destination_port_id');
    }
}