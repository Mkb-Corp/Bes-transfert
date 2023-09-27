<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Counter;

class CounterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Counter::create([
            'name' => 'Guichet 1'
        ]);
        Counter::create([
            'name' => 'Guichet 2'
        ]);
        Counter::create([
            'name' => 'Guichet 3'
        ]);
    }
}
