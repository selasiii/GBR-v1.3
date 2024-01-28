<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creating a sample admin user
        User::create([
            'user_id' => Str::uuid(),
            'role_id' => '3',
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@example.com',
            'address' => '123 Admin St',
            'phone_number' => '1234567890',
            'password' => Hash::make('password'),
            'gender' => 'male',
            'date_of_birth' => now()->subYears(25),
        ]);

        // Creating a sample agent user
        User::create([
            'user_id' => Str::uuid(),
            'role_id' => '2',
            'first_name' => 'Agent',
            'last_name' => 'User',
            'email' => 'agent@example.com',
            'address' => '456 Agent St',
            'phone_number' => '9876543210',
            'password' => Hash::make('password'),
            'gender' => 'female',
            'date_of_birth' => now()->subYears(30),
        ]);

        // Creating a sample regular user
        User::create([
            'user_id' => Str::uuid(),
            'role_id' => '1',
            'first_name' => 'Regular',
            'last_name' => 'User',
            'email' => 'user@example.com',
            'address' => '789 Regular St',
            'phone_number' => '5551234567',
            'password' => Hash::make('password'),
            'gender' => 'prefer_not_to_say',
            'date_of_birth' => now()->subYears(28),
        ]);

        // Create more users as needed
    }
}
