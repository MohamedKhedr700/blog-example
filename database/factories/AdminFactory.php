<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'email' => fake()->unique()->safeEmail,
            'password' => 'password',
        ];
    }
}
