<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => "900 VA",
                'price' => 1500,
            ],
            [
                'name' => "1300 VA",
                'price' => 2000,
            ],
        ]);
    }
}
