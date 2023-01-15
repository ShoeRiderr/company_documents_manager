<?php

namespace Database\Factories;

use App\Enums\InvoiceType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'is_income' => Arr::random(InvoiceType::options()),
            'number' => (string) $this->faker->numberBetween(1000, 100000),
            'price_netto' => $this->faker->numberBetween(100, 100000),
            'price_brutto' => $this->faker->numberBetween(100, 100000),
            'invoice_date' => Carbon::now(),
            'sell_date' => Carbon::now(),
        ];
    }
}
