<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use Illuminate\Database\Query\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class ShowInvoices extends Component
{
    use WithPagination;

    public $pagination = 30;

    public $searchByMonth = '';

    public $searchByYear = '';

    public $isIncome = true;

    protected $queryString = ['pagination', 'searchByMonth', 'searchByYear', 'isIncome'];

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
        return view('livewire.show-invoices', [
            'isIncome' => $this->isIncome,
            'invoices' => Invoice::where('is_income', $this->isIncome)
                ->when($this->searchByYear, function (Builder $query, $year) {
                    // $query->whereHas
                })
                ->when($this->searchByMonth, function (Builder $query, $date) {
                    // $query->whereHas('');
                })
                ->paginate($this->pagination),
        ]);
    }
}
