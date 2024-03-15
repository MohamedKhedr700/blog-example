<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title,
            'description' => fake()->text(255),
            'phone' => fake()->e164PhoneNumber,
        ];
    }
}
