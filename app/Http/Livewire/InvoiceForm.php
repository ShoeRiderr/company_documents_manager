<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Invoice;
use App\Models\Month;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\VatRate;
use App\Services\CompanyService;
use App\Services\ProductService;
use App\Services\YearService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Livewire\Component;

class InvoiceForm extends Component
{
    public Invoice $invoice;
    public Collection $products;
    public Collection $seller;
    public Collection $buyer;
    /**
     * @var EloquentCollection<PaymentMethod>
     */
    public EloquentCollection $paymentMethods;
    /**
     * @var EloquentCollection<VatRate>
     */
    public EloquentCollection $vatRates;

    protected $rules = [
        'invoice.number' => 'required',
        'invoice.city' => 'required',
        'invoice.invoice_date' => 'required',
        'invoice.sell_date' => 'required',
        'invoice.is_income' => 'required',
        'invoice.payment_method_id' => 'required|exists:payment_methods,id',
        'seller.name' => 'required',
        'seller.NIP' => 'required',
        'seller.street' => 'required',
        'seller.city' => 'required',
        'seller.build_num' => 'required',
        'seller.apart_num' => 'nullable',
        'seller.post_code' => 'required',
        'buyer.name' => 'required',
        'buyer.NIP' => 'required',
        'buyer.street' => 'required',
        'buyer.city' => 'required',
        'buyer.build_num' => 'required',
        'buyer.apart_num' => 'nullable',
        'buyer.post_code' => 'required',
        'products.*' => 'sometimes|required',
        'products.*.name' => 'required|min:2',
        'products.*.amount' => 'required',
        'products.*.price_netto' => 'required',
        'products.*.vat_rate_id' => 'required',
        'products.*.price_brutto_value' => 'required',
    ];

    protected $validationAttributes = [
        'invoice.number' => 'Invoice number',
        'invoice.city' => 'Invoice city',
        'invoice.invoice_date' => 'Invoice date',
        'invoice.sell_date' => 'Sell date',
        'invoice.is_income' => 'Is income',
        'invoice.payment_method_id' => 'Payment method',
        'seller.name' => 'Seller name',
        'seller.NIP' => 'Seller NIP',
        'seller.street' => 'Seller street',
        'seller.city' => 'Seller city',
        'buyer.name' => 'Buyer name',
        'buyer.NIP' => 'Buyer NIP',
        'buyer.street' => 'Buyer street',
        'buyer.city' => 'Buyer city',
        'products.*.name' => 'Product name',
        'products.*.amount' => 'Product amount',
        'products.*.price_netto' => 'Product netto price',
        'products.*.vat_rate_id' => 'Product vat rate',
        'products.*.price_brutto_value' => 'Product brutto price',
    ];

    public function mount(?Invoice $invoice)
    {
        $this->seller = collect([
            'name' => '',
            'NIP' => '',
            'street' => '',
            'city' => '',
        ]);
        $this->buyer = collect([
            'name' => '',
            'NIP' => '',
            'street' => '',
            'city' => '',
        ]);
        $this->products = collect();
        $this->invoice = $invoice ?? new Invoice;
        $this->paymentMethods = PaymentMethod::all();
        $this->vatRates = VatRate::all();
    }

    public function save()
    {
        $this->validate();

        $date = Carbon::createFromFormat('Y-m-d', $this->invoice->sell_date);
        $year = $date->year;
        $month = $date->month;

        $year = (new YearService)->addYear($year);

        $this->invoice->year_id = $year->id;
        $this->invoice->month_id = Month::find($month)->id;

        $buyer = $this->buyer->toArray();
        $seller = $this->seller->toArray();
        $buyerCity = City::updateOrCreate(['name' => Arr::get($buyer, 'city')]);
        $sellerCity = City::updateOrCreate(['name' => Arr::get($seller, 'city')]);

        $companyService = new CompanyService;
        $buyer = $companyService->updateOrCreate(array_merge($buyer, [
            'city_id' => $buyerCity->id
        ]));
        $seller = $companyService->updateOrCreate(array_merge($seller, [
            'city_id' => $sellerCity->id
        ]));

        $this->invoice->buyer_id = $buyer->id;
        $this->invoice->seller_id = $seller->id;

        $invoiceCity = City::updateOrCreate(['name' => $this->invoice->city]);

        $this->invoice->city_id = $invoiceCity->id;

        $this->invoice->save();

        $products = $this->products->mapWithKeys(function ($item, $key) {
            $product = (new ProductService)->updateOrCreate([
                'name' => Arr::get($item, 'name'),
                'vat_rate_id' => Arr::get($item, 'vat_rate_id'),
                'price_netto' => Arr::get($item, 'price_netto'),
            ]);

            return [
                $product->id => [
                    'amount' => Arr::get($item, 'amount'),
                ]
            ];
        });


        $this->invoice->products()->sync($products);
        $this->invoice->buyer()->updateOrCreate($this->buyer);
        $this->invoice->seller()->updateOrCreate($this->seller);

        return redirect()->route('invoices.index');
    }

    public function render()
    {
        return view('livewire.invoice-form');
    }

    public function addProduct()
    {
        $this->products->push(new Product([
            'vat_rate_id' => $this->vatRates->first()->id,
        ]));
    }

    public function removeProduct($index)
    {
        $this->products->forget($index);
    }

    public function onPriceNettoOrVatRateOrAmountChange(int $index)
    {
        do {
            $product = $this->products[$index];
            $vatRate = VatRate::find(Arr::get($product, 'vat_rate_id'));
            $vatRateValue = $vatRate->value;
            $vatPercent = is_numeric($vatRateValue) ? floatval($vatRateValue) : 0;
            $productAmount = Arr::get($product, 'amount', 1);
            $productAmount =  is_numeric($productAmount) ? intval($productAmount) : 1;
            $priceNetto = Arr::get($product, 'price_netto', 0);
            $priceNetto = is_numeric($priceNetto) ? floatval($priceNetto) * 100 : 0;

            if (!$priceNetto) {
                $this->products = $this->products->map(function ($product, $key) use ($index) {
                    if ($key === $index) {
                        $product['price_brutto_value'] = '';
                    }

                    return $product;
                });

                $this->countInvoiceTotal();
                break;
            }

            $this->products = $this->products->map(function ($product, $key) use (
                $index,
                $vatPercent,
                $productAmount,
                $priceNetto
            ) {
                if ($key === $index) {
                    $bruttoValue = (($priceNetto * ((100 + $vatPercent) / 100)) * $productAmount);

                    $priceNettoValue = ($priceNetto * $productAmount);
                    $vatAmount = $bruttoValue - $priceNettoValue;

                    $bruttoValue = $bruttoValue / 100;
                    $priceNettoValue = $priceNettoValue / 100;
                    $vatAmount = $vatAmount / 100;

                    $product['vat_amount'] = number_format((float) $vatAmount, 2, '.', '');
                    $product['price_netto_value'] = number_format((float) $priceNettoValue, 2, '.', '');

                    $product['price_brutto_value'] = number_format((float) $bruttoValue, 2, '.', '');
                }

                return $product;
            });

            $this->countInvoiceTotal();
        } while (0);
    }

    public function onPriceBruttoValueChange(int $index)
    {
        do {
            $product = $this->products[$index];
            $vatRate = VatRate::find(Arr::get($product, 'vat_rate_id'));
            $vatRateValue = $vatRate->value;
            $vatPercent = is_numeric($vatRateValue) ? floatval($vatRateValue) : 0;
            $productAmount = Arr::get($product, 'amount', 1);
            $productAmount =  is_numeric($productAmount) ? intval($productAmount) : 1;
            $priceBrutto = Arr::get($product, 'price_brutto_value', 0);
            $priceBrutto = is_numeric($priceBrutto) ? floatval($priceBrutto) * 100 : 0;

            if (!$priceBrutto) {
                $this->onPriceNettoOrVatRateOrAmountChange($index);
                $this->validateOnly('products.' . $index . '.price_brutto_value');
                $this->countInvoiceTotal();
                break;
            }

            $this->products = $this->products->map(function ($product, $key) use (
                $index,
                $vatPercent,
                $productAmount,
                $priceBrutto
            ) {
                if ($key === $index) {
                    $singleBruttoValue = ($priceBrutto / $productAmount);

                    $nettoValue = ($singleBruttoValue / ((100 + $vatPercent) / 100));
                    $priceNettoValue = $nettoValue * $productAmount;
                    $vatAmount = ($singleBruttoValue - $nettoValue) * $productAmount;

                    $nettoValue = $nettoValue / 100;
                    $priceNettoValue = $priceNettoValue / 100;
                    $vatAmount = $vatAmount / 100;

                    $product['vat_amount'] = number_format((float) $vatAmount, 2, '.', '');
                    $product['price_netto_value'] = number_format((float) $priceNettoValue, 2, '.', '');
                    $product['price_netto'] = number_format((float) $nettoValue, 2, '.', '');
                }

                return $product;
            });

            $this->countInvoiceTotal();
        } while (0);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    private function countInvoiceTotal()
    {
        $priceNetto = $this->products->sum(function ($product) {
            $result = Arr::get($product, 'price_netto_value');

            return is_numeric($result) ? $result * 100 : 0;
        });
        $priceBrutto = $this->products->sum(function ($product) {
            $result = Arr::get($product, 'price_brutto_value');

            return is_numeric($result) ? $result * 100 : 0;
        });
        $vatAmount = $this->products->sum(function ($product) {
            $result = Arr::get($product, 'vat_amount');

            return is_numeric($result) ? $result * 100 : 0;
        });
        $this->invoice->price_netto = $priceNetto / 100;
        $this->invoice->price_brutto = $priceBrutto / 100;
        $this->invoice->vat_amount = $vatAmount / 100;
    }
}
