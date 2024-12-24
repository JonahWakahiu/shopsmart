<?php

namespace Database\Factories;

use App\Models\ProductVariations;
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
            'type' => fake()->randomElement(['Size', 'Color']),
            'price' => fake()->randomFloat(2, 10, 500),
            'stock_quantity' => fake()->numberBetween(0, 50),
        ];
    }

    public function configure(): static
    {
        return $this->state(function (array $attributes) {
            // Depending on the variation type, set the variation value
            if ($attributes['type'] === 'Size') {
                return [
                    'value' => fake()->randomElement([
                        'Small',
                        'Medium',
                        'Large',
                        'Extra Large (XL)',
                        'Extra Extra Large (XXL)',
                        'One Size',
                        'Petite',
                        'Plus Size'
                    ]),
                ];
            }

            if ($attributes['type'] === 'Color') {
                return [
                    'value' => fake()->randomElement([
                        'Red',
                        'Blue',
                        'Green',
                        'Black',
                        'White',
                        'Yellow',
                        'Pink',
                        'Purple',
                        'Orange',
                        'Gray',
                        'Brown',
                        'Navy Blue'
                    ]),
                ];
            }

            return [];
        });
    }
}
