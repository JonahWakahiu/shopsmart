<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    // relationships
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function totalEarnings()
    {
        $total = $this->products->map(function ($product) {
            return $product->orders->sum('total_price');
        })->sum();

        return \Number::currency($total);
    }
}
