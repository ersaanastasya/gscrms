<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyCache extends Model
{
    use HasFactory;

    protected $table = 'currency_cache';

    /**
     * Mass Assignment
     */
    protected $fillable = [
        'base_currency',
        'target_currency',
        'exchange_rate',
        'api_response',
        'cached_at',
    ];

    /**
     * Attribute Casting
     */
    protected $casts = [
        'exchange_rate' => 'decimal:6',
        'cached_at' => 'datetime',
    ];
}