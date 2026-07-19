<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShipmentPosition extends Model
{
    use HasFactory;

    /**
     * Mass Assignment
     */
    protected $fillable = [
        'shipment_id',
        'current_location',
        'latitude',
        'longitude',
        'description',
        'position_time',
    ];

    /**
     * Attribute Casting
     */
    protected $casts = [
        'latitude' => 'double',
        'longitude' => 'double',
        'position_time' => 'datetime',
    ];

    /**
     * Shipment Position belongs to one Shipment.
     */
    public function shipment(): BelongsTo
    {
        return $this->belongsTo(Shipment::class);
    }
}