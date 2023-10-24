<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Actor>
 */
class ActorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => fake()->firstName(), 
            'lastname' => fake()->lastName(), 
            'agentname' => fake()->name(), 
            'actorphonenumber' => fake()->phoneNumber(), 
            'actortelephone'=> fake()->phoneNumber(), 
            'gmail' => fake()->email()
        ];
    }
}