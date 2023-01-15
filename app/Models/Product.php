<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'vat_percent',
        'price_netto',
        'price_brutto',
    ];

    public function invoices(): BelongsToMany
    {
        return $this->belongsByMany(Invoice::class);
    }
}
