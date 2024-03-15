<?php

namespace Database\Factories;

use App\Models\User;
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
            'user_id' => User::factory(),
        ];
    }
}
