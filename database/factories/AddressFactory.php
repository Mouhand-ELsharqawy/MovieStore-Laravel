<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cities_id' => fake()->randomDigitNotZero(1,10), 
            'address2' => fake()->streetAddress(), 
            'district' => fake()->word(), 
            'street' => fake()->streetName(), 
            'building' => fake()->word(), 
            'googleearthlocation' => fake()->sentence(), 
            'phone' => fake()->phoneNumber(), 
            'telephone' => fake()->phoneNumber(), 
            'postalcode' => fake()->postcode()
        ];
    }
}
