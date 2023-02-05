<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\VatRate;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
            if (!VatRate::exists()) {
                $this->call(VatRateSeeder::class);
            }

            $vatRate = VatRate::inRandomOrder()->first();

            $priceNetto = random_int(1, 10000);
            $vatPercent = is_numeric($vatRate->value) ? intval($vatRate->value) : 0;
            $priceBrutto = $priceNetto * ((100 + $vatPercent) / 100);

            Product::factory()->count(2)->create([
                'vat_rate_id' => $vatRate->id,
                'price_netto' => $priceNetto,
                'price_brutto' => $priceBrutto,
            ]);
        }
    }
}
