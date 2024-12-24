<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
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
            'name' => fake()->words(7, true),
            'barcode' => fake()->isbn13(),
            'short_description' => fake()->sentences(2, true),
            'description' => $this->generateRandomHtml(),
            'price' => fake()->randomFloat(2, 10, 500),
            'status' => fake()->randomElement(['sheduled', 'published', 'inactive']),
            'stock_quantity' => fake()->numberBetween(0, 100),
            'sku' => strtoupper(Str::random(8)),
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }

    private function generateRandomHtml()
    {
        $headings = [
            "<h1>" . $this->faker->words(3, true) . "</h1>",
            "<h2>" . $this->faker->words(4, true) . "</h2>",
        ];

        $paragraphs = [
            "<p>" . $this->faker->paragraph . "</p>",
            "<p>" . $this->faker->sentence . "</p>",
        ];

        $lists = [
            "<ul><li>" . implode("</li><li>", $this->faker->words(5)) . "</li></ul>",
            "<ol><li>" . implode("</li><li>", $this->faker->words(5)) . "</li></ol>",
        ];

        $blockquotes = [
            "<blockquote>" . $this->faker->sentence . "</blockquote>",
        ];

        $htmlContent = array_merge($headings, $paragraphs, $lists, $blockquotes);

        // Shuffle and return as a string
        shuffle($htmlContent);

        return implode("\n", $htmlContent);
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Product $product) {

            if ($product->status === 'shedule') {
                $product->published_on = fake()->dateTimeBetween('+1 day', '+1 month');
                $product->save();
            }
        });
    }
}
