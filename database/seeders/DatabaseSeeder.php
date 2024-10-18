<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Player;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Player::factory(5000)->create();
    }
}
