<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Arr;

class ProductService
{
    public function updateOrCreate(array $data): Product
    {
        return Product::updateOrCreate(
            ['name' => Arr::get($data, 'name')],
            $data
        );
    }
}
