<?php

namespace Database\Seeders;

use App\Models\Year;
use App\Services\YearService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class YearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Year::factory(3)->create();

        (new YearService)->addYear(year: date('Y'));
    }
}
