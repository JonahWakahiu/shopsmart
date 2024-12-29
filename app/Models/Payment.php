<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentFactory> */
    use HasFactory;

    protected $fillable = [
        'status',
        'transaction_id',
        'amount',
        'payment_method',
    ];

    // relationships
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
