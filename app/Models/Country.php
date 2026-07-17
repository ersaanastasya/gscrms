<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;

    /**
     * Nama tabel
     */
    protected $table = 'countries';

    /**
     * Primary Key
     */
    protected $primaryKey = 'id';

    /**
     * Mass Assignment
     */
    protected $fillable = [

        'country_code',

        'country_name',

        'official_name',

        'capital',

        'region',

        'subregion',

        'latitude',

        'longitude',

        'flag_png',

        'flag_svg',

        'currency_code',

        'currency_name',

        'timezone',

    ];

    /**
     * Casting
     */
    protected $casts = [

        'latitude' => 'double',

        'longitude' => 'double',

    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

        /**
         * Statistik negara
         */
        public function statistics()
        {
            return $this->hasMany(CountryStatistic::class);
        }

        /**
         * Risk Score
         */
        public function riskScore()
        {
            return $this->hasOne(RiskScore::class);
        }

        /**
         * Ports
         */
        public function ports()
        {
            return $this->hasMany(Port::class);
        }
    
    /*
    |---/**
     * Favorite
     */
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
    /*-------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /**
     * Nama + Kode
     */
    public function getDisplayNameAttribute()
    {
        return "{$this->country_name} ({$this->country_code})";
    }

    /**
     * Flag
     */
    public function getFlagAttribute()
    {
        return $this->flag_png;
    }

    /**
     * Coordinates
     */
    public function getCoordinatesAttribute()
    {
        return [

            'lat' => $this->latitude,

            'lng' => $this->longitude

        ];
    }
}

