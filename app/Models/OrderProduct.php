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
                $pivot->discount = $product->discount ?? 0;

                $pivot->price = $product->price;
                if ($pivot->variation_id) {
                    $variation = $product->variations->find($pivot->variation_id);
                    $pivot->price = $variation->price;
                }
                $pivot->items_discount = $pivot->quantity * $pivot->discount;
                $pivot->items_total = $pivot->quantity * $pivot->price;
            }
        });

        static::saved(function ($pivot) {
            $order = Order::find($pivot->order_id);

            if ($order) {
                $order->total_discount = $order->products()->sum('items_discount');
                $order->sub_total = $order->products()->sum('items_total');
                $order->total = $order->sub_total - $order->total_discount;
            }
            $order->save();
        });
    }
}
