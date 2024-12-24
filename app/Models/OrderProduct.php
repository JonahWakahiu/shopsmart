<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderProduct extends Pivot
{
    // event
    protected static function booted()
    {
        static::saving(function ($pivot) {
            $product = Product::findOrFail($pivot->product_id);

            if ($product) {
                $pivot->discount_at_order = $product->discount ?? 0;
                $pivot->price_at_order = $product->price;
                $pivot->price_total = $pivot->quantity * $pivot->price_at_order;
                $pivot->discount_total = $pivot->quantity * $pivot->discount_at_order;
            }
        });

        static::saved(function ($pivot) {
            $order = Order::find($pivot->order_id);

            if ($order) {
                $totalPrice = $order->products()->sum('price_total');
                $totalDiscount = $order->products()->sum('discount_total');

                $order->total_price = $totalPrice;
                $order->total_discount = $totalDiscount;
                $order->save();
            }
        });
    }
}
