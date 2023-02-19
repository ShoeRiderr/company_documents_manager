<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'vat_rate_id',
        'price_netto',
        'price_brutto',
    ];

    protected $casts = [
        'price_netto' => 'integer',
        'price_brutto' => 'integer',
    ];

    public function invoices(): BelongsToMany
    {
        return $this->belongsByMany(Invoice::class);
    }

    public function vatRate(): BelongsTo
    {
        return $this->belongsTo(VatRate::class);
    }

    public function setPriceNettoAttribute($value)
    {
        $priceNetto = $this->attributes['price_netto'] = $value * 100;

        $vatRate = $this->vatRate->value;
        $vatPercent = is_numeric($vatRate) ? floatval($vatRate) : 0;

        $this->attributes['price_brutto'] = $priceNetto * ((100 + $vatPercent) / 100);
    }
}
