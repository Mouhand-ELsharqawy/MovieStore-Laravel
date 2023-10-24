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
            'rentals_id' => fake()->randomDigitNotZero(1,10), 
            'customers_id' => fake()->randomDigitNotZero(1,10), 
            'staff_id' => fake()->randomDigitNotZero(1,10), 
            'amount' => fake()->randomFloat(), 
            'paymentdate' => fake()->date()
        ];
    }
}
