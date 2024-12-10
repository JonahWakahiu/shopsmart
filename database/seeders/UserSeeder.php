<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(['email' => 'admin@gmail.com'], ['name' => 'Main Admin', 'phone_number' => fake()->phoneNumber(), 'password' => 'password']);
        User::firstOrCreate(['email' => 'user@gmail.com'], ['name' => 'Main user', 'phone_number' => fake()->phoneNumber(), 'password' => 'password']);

        User::factory(100)->create();
    }
}
