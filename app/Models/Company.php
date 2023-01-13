<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Company extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'NIP',
        'street',
        'build_num',
        'apart_num',
        'post_code',
        'city',
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
