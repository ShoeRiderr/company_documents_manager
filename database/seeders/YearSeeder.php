<?php

namespace Database\Seeders;

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
        (new YearService)->addYear(year: date('Y'));
    }
}
