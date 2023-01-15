<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $priceNetto = $this->faker->numberBetween(10, 10000);
        $vatPercent = $this->faker->numberBetween(0, 25);
        $priceBrutto = $priceNetto * ((100 + $vatPercent) / 100);

        return [
            'name' => $this->faker->unique()->sentence(),
            'vat_percent' => $vatPercent,
            'price_netto' => $priceNetto,
            'price_brutto' => $priceBrutto,
        ];
    }
}
