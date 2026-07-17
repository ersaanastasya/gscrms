<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Port extends Model
{
    use HasFactory;

    protected $table = 'ports';

    protected $fillable = [

        'country_id',

        'port_name',

        'port_code',

        'city',

        'latitude',

        'longitude',

        'status'

    ];

    protected $casts = [

        'latitude' => 'decimal:6',

        'longitude' => 'decimal:6',

    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}