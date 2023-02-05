<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use App\Models\PaymentMethod;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;
use Livewire\Component;

class InvoiceForm extends Component
{
    public Invoice $invoice;
    public Collection $products;

    /**
     * @var EloquentCollection<PaymentMethod>
     */
    public EloquentCollection $paymentMethods;

    protected $rules = [
        'invoice.number' => 'required',
        'invoice.city' => 'required',
        'invoice.invoice_date' => 'required',
        'invoice.sell_date' => 'required',
        'invoice.is_income' => 'required',
        'invoice.payment_method' => 'required|exists:payment_methods,id',
    ];

    public function mount(?Invoice $invoice)
    {
        $this->products = collect();
        $this->invoice = $invoice ?? new Invoice;
        $this->paymentMethods = PaymentMethod::all();
    }

    public function save()
    {
        $this->validate();

        $this->invoice->save();
    }

    public function render()
    {
        return view('livewire.invoice-form');
    }

    public function addProduct()
    {
        $this->products->push([]);
    }

    public function removeProduct($index)
    {
        $this->products->forget($index);
    }

    public function updatedProducts()
    {
        dump('ajajaja');
    }
}
