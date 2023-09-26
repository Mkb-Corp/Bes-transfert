<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Billet;

class BilletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // USD Billets

        Billet::create([
            'amount' => 5,
            'currency_id' => 1,
        ]);
        Billet::create([
            'amount' => 10,
            'currency_id' => 1,
        ]);
        Billet::create([
            'amount' => 20,
            'currency_id' => 1,
        ]);
        Billet::create([
            'amount' => 50,
            'currency_id' => 1,
        ]);
        Billet::create([
            'amount' => 100,
            'currency_id' => 1,
        ]);

        // CDF Billets

        Billet::create([
            'amount' => 500,
            'currency_id' => 2,
        ]);
        Billet::create([
            'amount' => 1000,
            'currency_id' => 2,
        ]);
        Billet::create([
            'amount' => 5000,
            'currency_id' => 2,
        ]);
        Billet::create([
            'amount' => 10000,
            'currency_id' => 2,
        ]);
        Billet::create([
            'amount' => 20000,
            'currency_id' => 2,
        ]);
    }
}
