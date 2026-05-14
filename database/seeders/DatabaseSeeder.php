<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a default admin user
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@codequest.com',
            'role' => 'admin',
        ]);

        // Create a default faculty user
        User::factory()->create([
            'name' => 'Faculty User',
            'email' => 'faculty@codequest.com',
            'role' => 'faculty',
        ]);

        // Create a default student user
        User::factory()->create([
            'name' => 'Student User',
            'email' => 'student@codequest.com',
            'role' => 'student',
        ]);

        // Create 10 more random student users
        User::factory(10)->create();

        $this->call([
            QuizSeeder::class,
        ]);
    }
}
