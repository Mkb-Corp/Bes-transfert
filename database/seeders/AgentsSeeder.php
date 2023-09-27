<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AgentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Alain Premier',
            'email' => 'alain123@gmail.com',
            'password' => Hash::make('1234abcd'),
            'role' => 'ROLE_AGENT'
        ]);
        User::create([
            'name' => 'Sarah Calou',
            'email' => 'sarah.calou@gmail.com',
            'password' => Hash::make('1234abcd'),
            'role' => 'ROLE_AGENT'
        ]);
        User::create([
            'name' => 'Anita Premier',
            'email' => 'anita456@gmail.com',
            'password' => Hash::make('1234abcd'),
            'role' => 'ROLE_AGENT'
        ]);
    }
}
