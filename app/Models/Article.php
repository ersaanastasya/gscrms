<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    /**
     * Mass Assignment
     */
    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'category',
        'author',
        'published_at',
        'is_published',
    ];

    /**
     * Attribute Casting
     */
    protected $casts = [
        'published_at' => 'datetime',
        'is_published' => 'boolean',
    ];
}