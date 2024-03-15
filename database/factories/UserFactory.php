<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'username' => fake()->name,
            'phone' => fake()->unique()->e164PhoneNumber,
            'email' => fake()->unique()->email,
            'password' => 'password',
        ];
    }
}
