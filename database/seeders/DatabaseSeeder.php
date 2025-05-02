<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('Seeding 15 cities...');
        City::factory(15)->create();
        
        $this->command->info('Seeding 100 students...');
        Student::factory(100)->create();

        $this->command->info('Creating test users...');
        User::factory(10)->create();
        
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password123'),
        ]);

        $this->command->info('Database seeding completed!');
    }
}