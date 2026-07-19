<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiLog extends Model
{
    use HasFactory;

    /**
     * Mass Assignment
     */
    protected $fillable = [
        'api_name',
        'endpoint',
        'request_method',
        'request_payload',
        'response_payload',
        'status_code',
        'response_time',
        'success',
        'requested_at',
    ];

    /**
     * Attribute Casting
     */
    protected $casts = [
        'request_payload' => 'array',
        'response_payload' => 'array',
        'status_code' => 'integer',
        'response_time' => 'decimal:2',
        'success' => 'boolean',
        'requested_at' => 'datetime',
    ];
}