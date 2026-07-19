<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositiveWord extends Model
{
    use HasFactory;

    /**
     * Mass Assignment
     */
    protected $fillable = [
        'word',
        'weight',
        'description',
    ];

    /**
     * Attribute Casting
     */
    protected $casts = [
        'weight' => 'decimal:2',
    ];
}