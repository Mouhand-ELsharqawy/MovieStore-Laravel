<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'languages_id'  => fake()->randomDigitNotZero(1,10), 
            'title' => fake()->word(), 
            'desc' => fake()->sentence(), 
            'releaseyear' => fake()->date(), 
            'rentalduration' => fake()->randomFloat(), 
            'rentalrate' => fake()->randomFloat(), 
            'length' => fake()->randomFloat(), 
            'replacementcost' => fake()->randomFloat(), 
            'rating' => fake()->randomFloat(), 
            'specialfeature' => fake()->word(), 
            'fulltext' => fake()->sentence()
        ];
    }
}
