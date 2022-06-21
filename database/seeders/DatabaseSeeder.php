<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Location;
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
         Country::factory(10)->create();
         Location::factory(10)->create();
    }
}
