<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BilletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // USD Billets

        DB::table('billets')->insert([
            'amount' => 5,
            'currency_id' => 1,
        ]);
        DB::table('billets')->insert([
            'amount' => 10,
            'currency_id' => 1,
        ]);
        DB::table('billets')->insert([
            'amount' => 20,
            'currency_id' => 1,
        ]);
        DB::table('billets')->insert([
            'amount' => 50,
            'currency_id' => 1,
        ]);
        DB::table('billets')->insert([
            'amount' => 100,
            'currency_id' => 1,
        ]);

        // CDF Billets

        DB::table('billets')->insert([
            'amount' => 500,
            'currency_id' => 2,
        ]);
        DB::table('billets')->insert([
            'amount' => 1000,
            'currency_id' => 2,
        ]);
        DB::table('billets')->insert([
            'amount' => 5000,
            'currency_id' => 2,
        ]);
        DB::table('billets')->insert([
            'amount' => 10000,
            'currency_id' => 2,
        ]);
        DB::table('billets')->insert([
            'amount' => 20000,
            'currency_id' => 2,
        ]);
    }
}
