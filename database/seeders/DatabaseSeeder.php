<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Reception User',
            'email' => 'reception@test.com',
            'password' => bcrypt('password'),
            'role' => 'reception',
        ]);

        User::factory()->create([
            'name' => 'Worker User',
            'email' => 'worker@test.com',
            'password' => bcrypt('password'),
            'role' => 'worker',
            'meal_credit' => 20,
        ]);
    }
}
