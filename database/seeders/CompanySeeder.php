<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (empty($cities = City::all())) {
            Company::factory()
                ->count(10)
                ->for(City::factory())
                ->create();
        }

        foreach ($cities as $city) {
            Company::factory()
                ->for($city)
                ->create();
        }
    }
}
