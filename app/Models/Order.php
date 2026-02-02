<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'customer_name',
        'customer_phone',
        'order_items',
        'total_amount',
        'status',
        'delivery_method',
        'notes'
    ];

    protected $casts = [
        'order_items' => 'array',
        'total_amount' => 'decimal:2'
    ];

    public function testimonial()
    {
        return $this->hasOne(Testimonial::class);
    }
}
