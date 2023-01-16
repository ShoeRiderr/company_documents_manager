<?php

namespace App\Services;

use App\Models\Invoice;
use App\Models\Month;
use App\Models\Year;
use Illuminate\Support\Collection;

class YearService
{
    public function addYear(int $year): Year
    {
        return Year::updateOrCreate([
            'value' => $year,
        ]);
    }

    public function getInvoicesFromSpecificYear(Year $year): Collection
    {
        return $year->months->map(function (Month $month) {
            return Invoice::find($month->pivot->invoice_id);
        });
    }

    public function getInvoicesFromSpecificYearGroupedByMonths(Year $year): Collection
    {
        return $year->months->groupBy(function ($month) {
            return $month->id;
        })->map(function (Collection $items) {
            return $items->map(function (Month $month) {
                return Invoice::find($month->pivot->invoice_id);
            });
        });
    }
}
