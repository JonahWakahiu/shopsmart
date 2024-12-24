<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductVariations extends Model
{
    /** @use HasFactory<\Database\Factories\ProductVariationsFactory> */
    use HasFactory;

    protected $fillable = [
        'variation_type',
        'variation_value',
        'variation_price',
        'variation_stock_quantity',
    ];

    // relationships
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
