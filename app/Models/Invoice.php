<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Invoice extends Model
{
    use HasFactory;

    public $fillable = [
        'year_id',
        'month_id',
        'is_income',
        'number',
        'price_netto',
        'price_brutto',
        'invoice_date',
        'sell_date',
    ];

    protected $casts = [
        'price_netto' => 'integer',
        'price_brutto' => 'integer',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
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

    public function getPriceNettoAttribute($value)
    {
        return number_format($this->attributes['price_netto'] / 100, 2);
    }

    public function getPriceBruttoAttribute($value)
    {
        return number_format($this->attributes['price_brutto'] / 100, 2);
    }
}
