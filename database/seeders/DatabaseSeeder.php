<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Jane Doe',
            'email' => 'janedoe@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('anhung999'), //  Bcrypt
            'remember_token' => \Illuminate\Support\Str::random(10),
        ]);
    }
}
