<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'google_maps_url',
        'operational_hours',
        'is_main'
    ];

    protected $casts = [
        'is_main' => 'boolean'
    ];
}