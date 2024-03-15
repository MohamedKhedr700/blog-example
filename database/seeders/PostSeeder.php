<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the seeder.
     */
    public function run(): void
    {
        Post::factory()->create();
    }
}
