<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'description',
        'price',
        'image_path',
        'is_recommended',
        'order',
        'is_active'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_recommended' => 'boolean',
        'is_active' => 'boolean'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByCategory($query, $category)
    {
        if ($category === 'all') {
            return $query;
        }
        return $query->where('category', $category);
    }

    public function scopeRecommended($query)
    {
        return $query->where('is_recommended', true);
    }
}