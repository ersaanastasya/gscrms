<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsCache extends Model
{
    use HasFactory;

    protected $table = 'news_cache';

    /**
     * Mass Assignment
     */
    protected $fillable = [
        'title',
        'source',
        'url',
        'published_at',
        'sentiment',
        'summary',
        'api_response',
        'cached_at',
    ];

    /**
     * Attribute Casting
     */
    protected $casts = [
        'published_at' => 'datetime',
        'cached_at' => 'datetime',
    ];
}