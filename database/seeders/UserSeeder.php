<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@daurulang.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
        
        // Regular user
        User::create([
            'name' => 'User',
            'email' => 'user@daurulang.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}