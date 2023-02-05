<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use App\Models\Month;
use App\Models\Year;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class ShowInvoices extends Component
{
    use WithPagination;

    public $pagination = 15;

    public $searchMonth = '';

    public $searchYear = '';

    public $isIncome = true;

    public $years;

    public $months;

    protected $queryString = ['pagination', 'searchMonth', 'searchYear', 'isIncome'];

    public function mount()
    {
        $this->years = Year::all();
        $this->months = Month::query()->orderBy('id')->get();
    }

    public function updatingSearchByMonth()
    {
        $this->resetPage();
    }

    public function updatingSearchByYear()
    {
        $this->resetPage();
    }

    public function updatingIsIncome()
    {
        $this->resetPage();
    }

    public function render()
    {
        if (!$this->searchYear) {
            $this->searchMonth = '';
        }

        return view('livewire.show-invoices', [
            'isIncome' => $this->isIncome,
            'invoices' => Invoice::where('is_income', $this->isIncome)
                ->when($this->searchYear, function (Builder $query) {
                    $query->whereHas('year', function (Builder $query) {
                        $query->where('id', $this->searchYear);
                    });

                    $query->when($this->searchMonth, function (Builder $query) {
                        $query->whereHas('month', function (Builder $query) {
                            $query->where('id', $this->searchMonth);
                        });
                    });
                })
                ->paginate($this->pagination),
        ]);
    }

    public function deleteInvoice($invoiceId)
    {
        Invoice::find($invoiceId)->delete();
    }
}
