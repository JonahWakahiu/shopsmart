<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(2, true),
            'slug' => fake()->slug(),
            'description' => fake()->paragraph(),
            'short_description' => fake()->sentence(),
            'price' => fake()->randomFloat(2, 10, 500),
            'status' => fake()->randomElement(['active', 'inactive']),
            'stock_quantity' => fake()->numberBetween(0, 100),
            'sku' => strtoupper(Str::random(8)),
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
