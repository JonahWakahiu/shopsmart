<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductVariations>
 */
class ProductVariationsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'variation_type' => fake()->randomElement(['Size', 'Color']),
            'variation_value' => fake()->randomElement(['Small', 'Medium', 'Large', 'Red', 'Blue']),
            'price' => fake()->randomFloat(2, 10, 500),
            'stock_quantity' => fake()->numberBetween(0, 50),
            'sku' => strtoupper(Str::random(8)),
        ];
    }
}
