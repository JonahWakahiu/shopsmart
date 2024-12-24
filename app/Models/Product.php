<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    // relationships
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImages::class);
    }

    public function oldestImage(): HasOne
    {
        return $this->hasOne(ProductImages::class)->oldestOfMany();
    }

    public function variations(): HasMany
    {
        return $this->hasMany(ProductVariations::class);
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class)
            ->withPivot('quantity', 'price_at_order', 'discount_at_order', 'price_total', 'discount_total')
            ->using(OrderProduct::class)
            ->withTimestamps();
    }

    // cast
    protected function description(): Attribute
    {
        return Attribute::make(
            set: fn(string $value) => json_encode($value),
            get: fn(string $value) => json_decode($value),
        );
    }

    protected function status(): Attribute
    {
        return Attribute::make(
            set: fn(string $value) => match ($value) {
                'publish' => 'published',
                'shedule' => 'sheduled',
                default => $value,
            },
            get: fn(string $value) => match ($value) {
                'published' => 'publish',
                'sheduled' => 'shedule',
                default => $value,
            }
        );
    }
    // events
    protected static function booted(): void
    {
        static::creating(function (Product $product) {
            if ($product->status === 'published') {
                $product->published_on = now();
            }
        });
    }
}
