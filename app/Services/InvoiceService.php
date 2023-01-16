<?php

namespace App\Services;

use App\Enums\InvoiceType;
use App\Models\Invoice;
use App\Models\Month;
use App\Models\Year;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;

class InvoiceService
{
    public function getMonthTakings(Year $year, Month $month)
    {
        return Invoice::query()
            ->where('is_income', InvoiceType::INCOME->value)
            ->whereHas('year', function (Builder $query) use ($year, $month) {
                $query->where('id', $year->id)
                    ->whereHas('months', function (Builder $query) use ($month) {
                        $query->where('id', $month->id);
                    });
            })->sum('price_brutto');
    }

    public function getYearTakings(Year $year)
    {

    }

    public function getMonthCosts(Year $year, Month $month)
    {

    }

    public function getYearCosts(Year $year)
    {

    }

    public function getMonthAvails(Year $year, Month $month)
    {

    }

    public function getYearAvails(Year $year)
    {

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
