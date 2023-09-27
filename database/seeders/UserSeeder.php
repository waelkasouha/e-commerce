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
        User::create([
            'name' => 'Wael',
            'email' => 'wael@gmail.com',
            'email_verified_at' => now(),
            'password' => '12345678',
        ])->assignRole('Owner');
    }
}
