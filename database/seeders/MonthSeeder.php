<?php

namespace Database\Seeders;

use App\Models\Month;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MonthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (__('general.months') as $key => $name) {
            Month::create([
                'name' => 'general.months.' . $key,
                'value' => $key,
            ]);
        }
    }
}
