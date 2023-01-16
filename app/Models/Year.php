<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Year extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'value',
    ];

    public function months(): BelongsToMany
    {
        return $this->belongsToMany(Month::class, 'invoice_month_year', 'year_id', 'month_id')->withPivot(['invoice_id']);
    }

    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }
}
