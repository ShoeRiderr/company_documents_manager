<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Month extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function years(): BelongsToMany
    {
        return $this->belongsToMany(Year::class, 'invoice_month_year', 'month_id', 'year_id');
    }
}
