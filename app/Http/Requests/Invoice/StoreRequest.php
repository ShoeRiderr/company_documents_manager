<?php

namespace App\Http\Requests\Invoice;

use App\Enums\InvoiceType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'year_id' => ['required', 'exists:years'],
            'month_id' => ['required', 'exists:months'],
            'seller_id' => ['required', 'exists:companies'],
            'buyer_id' => ['required', 'exists:companies'],
            'payment_method_id' => ['required', 'exists:payment_methods'],
            'is_income' => ['required', Rule::in(InvoiceType::options())],
            'number' => ['required'],
            'price_netto' => ['required'],
            'price_brutto' =>['required'],
            'invoice_date' =>['required', 'date'],
            'sell_date' => ['required', 'date'],
            'products' => ['array', 'required'],
            'products,*' => ['required', 'exists:products'],
        ];
    }
}
