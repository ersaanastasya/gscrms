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
    'summary',
    'content',
    'author',
    'image',
    'status',
    'published_at',
];

    /**
     * Attribute Casting
     */
    protected $casts = [
    'published_at' => 'datetime',
];
}