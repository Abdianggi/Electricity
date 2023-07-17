<?php

namespace Database\Seeders;

use App\Models\Electricity;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Call Seeders
        $this->call(ProductSeeder::class);
        
        // Create with factories
        Electricity::factory(25)->create();
    }
}
