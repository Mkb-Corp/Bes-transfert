<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrenncySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('currencies')->insert([
            'symbol' => 'USD',
            'spelling' => 'Dollars Americains',
            'isLocal' => false
        ]);
        DB::table('currencies')->insert([
            'symbol' => 'CDF',
            'spelling' => 'Francs Congolais',
            'isLocal' => true
        ]);
    }
}
