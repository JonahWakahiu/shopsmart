<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductVariations extends Model
{
    /** @use HasFactory<\Database\Factories\ProductVariationsFactory> */
    use HasFactory;

    // relationships
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
