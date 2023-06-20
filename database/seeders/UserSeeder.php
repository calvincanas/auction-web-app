<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // admin
        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@kahera.test',
            'password' => Hash::make('password'),
        ]);

        User::factory()->create([
            'name' => 'Jay Smith',
            'email' => 'bidder1@test.com',
            'password' => Hash::make('password'),
        ]);

        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'bidder2@test.com',
            'password' => Hash::make('password'),
        ]);

        User::factory()->count(100)->create();
    }
}
