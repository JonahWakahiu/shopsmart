<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount' => fake()->randomFloat(2, 50, 2000),
            'status' => fake()->randomElement(['pending', 'completed', 'failed', 'refunded']),
            'payment_method' => fake()->randomElement(['credit_card', 'paypal', 'bank_transfer']),
            'transaction_id' => fake()->unique()->uuid(),
        ];
    }
}
