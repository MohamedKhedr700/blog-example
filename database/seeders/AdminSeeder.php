<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the seeder.
     */
    public function run(): void
    {
        Admin::factory()->create();
    }
}
