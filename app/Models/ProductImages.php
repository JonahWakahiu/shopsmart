<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductImages extends Model
{
    /** @use HasFactory<\Database\Factories\ProductImagesFactory> */
    use HasFactory;

    protected $fillable = [
        'url',
        'is_primary',
    ];

    // relationships
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    // cast
    protected function url(): Attribute
    {
        return Attribute::make(
            get: fn(?string $value) => \Str::startsWith($value, 'https') ? $value : '/storage/' . $value,
        );

    }
}
