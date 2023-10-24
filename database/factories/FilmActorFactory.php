<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FilmActor>
 */
class FilmActorFactory extends Factory
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
            'actors_id' => fake()->randomDigitNotZero(1,10)
        ];
    }
}
