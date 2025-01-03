<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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

    protected $fillable = [
        'status',
        'published_on',
    ];

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
            ->withPivot(
                'variation_id',
                'quantity',
                'price',
                'discount',
                'items_total',
                'items_discount',
            )
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
                'inactive' => 'inactive',
            },
            get: fn(string $value) => match ($value) {
                'published' => 'publish',
                'sheduled' => 'shedule',
                'inactive' => 'inactive',
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

    // scope
    public function scopePublished(Builder $query)
    {
        $query->where('status', 'published');
    }

}
