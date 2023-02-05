<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

    public function setPriceNettoAttribute($value)
    {
        $this->attributes['price_netto'] = $value * 100;
    }

    public function setPriceBruttoAttribute($value)
    {
        $this->attributes['price_brutto'] = $value * 100;
    }
}
