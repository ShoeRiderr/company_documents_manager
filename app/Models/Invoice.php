<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'year_id',
        'month_id',
        'seller_id',
        'buyer_id',
        'payment_method_id',
        'city_id',
        'is_income',
        'number',
        'price_netto',
        'price_brutto',
        'vat_amount',
        'invoice_date',
        'sell_date',
    ];

    protected $casts = [
        'price_netto' => 'integer',
        'price_brutto' => 'integer',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('amount');
    }

    public function seller(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function buyer(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function year(): BelongsTo
    {
        return $this->belongsTo(Year::class);
    }

    public function month(): BelongsTo
    {
        return $this->belongsTo(Month::class);
    }

    public function setPriceNettoAttribute($value)
    {
        $this->attributes['price_netto'] = $value * 100;
    }

    public function setPriceBruttoAttribute($value)
    {
        $this->attributes['price_brutto'] = $value * 100;
    }

    public function setVatAmountAttribute($value)
    {
        $this->attributes['vat_amount'] = $value * 100;
    }

    public function getPriceNettoAttribute()
    {
        return number_format($this->attributes['price_netto'] / 100, 2);
    }

    public function getPriceBruttoAttribute()
    {
        return number_format($this->attributes['price_brutto'] / 100, 2);
    }

    public function getVatAmountAttribute()
    {
        return number_format($this->attributes['vat_amount'] / 100, 2);
    }
}
