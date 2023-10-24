<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FilmCatagory>
 */
class FilmCatagoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'films_id' => fake()->randomDigitNotZero(1,10),
            'catagories_id' => fake()->randomDigitNotZero(1,10)
        ];
    }
}
