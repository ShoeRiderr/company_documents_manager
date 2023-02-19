<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Support\Arr;

class CompanyService
{
    public function updateOrCreate($data): Company
    {
        return Company::updateOrCreate([
            'city_id' => Arr::get($data, 'city_id'),
            'name' => Arr::get($data, 'name'),
            'NIP' => Arr::get($data, 'NIP'),
        ], $data);
    }
}
