<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    // relationships
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)
            ->withPivot(
                'quantity',
                'price_at_order',
                'discount_at_order',
                'price_total',
                'discount_total',
                'variation_id',
            )
            ->using(OrderProduct::class)
            ->withTimestamps();
    }

    public function statuses(): HasMany
    {
        return $this->hasMany(OrderStatusHistory::class);
    }

    public function latestStatus(): HasOne
    {
        return $this->hasOne(OrderStatusHistory::class)->latestOfMany();
    }

    public function firstProduct()
    {
        return $this->products()->with('oldestImage')->oldest('created_at')->limit(1);
    }

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }

    // event
    protected static function booted(): void
    {
        static::creating(function (Order $order) {
            if (!$order->order_number) {
                $order->order_number = fake()->numerify('ORD-######');
            }
        });

        static::created(function (Order $order) {
            $order->statuses()->create([
                'status' => 'pending',
            ]);
        });
    }
}
