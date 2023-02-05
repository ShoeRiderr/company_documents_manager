<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VatRate extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'value',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
