<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // By convention, the model "Order" maps to the "orders" table.
    // We'll allow mass-assignment for the fields we care about in this demo.
    protected $fillable = ['customer_name', 'total'];

    // Ensure totals are rendered with 2 decimals when cast back.
    protected $casts = [
        'total' => 'decimal:2',
    ];
}
