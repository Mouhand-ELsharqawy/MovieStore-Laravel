<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Staff>
 */
class StaffFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'addresses_id' => fake()->randomDigitNotZero(1,10), 
            'stores_id' => fake()->randomDigitNotZero(1,10), 
            'firstname' => fake()->firstName(), 
            'lastname' => fake()->lastName(), 
            'username' => fake()->name(), 
            'email' => fake()->email(), 
            'pictureurl' => fake()->url()
        ];
    }
}
