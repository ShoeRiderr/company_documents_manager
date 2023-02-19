<?php

namespace App\Services;

use App\Models\Year;

class YearService
{
    public function addYear(int $year): Year
    {
        return Year::updateOrCreate([
            'value' => $year,
        ]);
    }
}
