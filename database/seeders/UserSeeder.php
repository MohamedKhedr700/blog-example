<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the seeder.
     */
    public function run(): void
    {
        User::factory()->create();
    }
}
