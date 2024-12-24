<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_number' => fake()->numerify('ORD-######'),
            'total_price' => fake()->randomFloat(2, 100, 1000),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }

    public function withProducts(): Factory
    {
        return $this->afterCreating(function (Order $order) {
            $products = Product::inRandomOrder()->take(rand(2, 7))->get();

            foreach ($products as $product) {
                $order->products()->attach($product, [
                    'quantity' => rand(1, 5),
                ]);
            }

            $order->statuses()->create([
                'status' => 'pending',
            ]);
        });
    }
}
