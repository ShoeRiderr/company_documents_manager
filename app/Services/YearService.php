<?php

namespace App\Services;

use App\Models\Month;
use App\Models\Year;
use Carbon\Carbon;

class YearService
{
    public function addYear(int $year)
    {
        $year = Year::create([
            'value' => $year,
        ]);

        $year->months()->sync(Month::all('id')->pluck('id'));
    }
}
