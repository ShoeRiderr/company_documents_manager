<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Invoice;
use App\Models\Month;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\Year;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
            $builder = Invoice::factory()->count(5);

            if (empty($companies = Company::all())) {
                $companies = Company::factory()->count(2)->create();
            } else {
                $companies = $companies->random(2);
            }

            if (empty($paymentMethods = PaymentMethod::all())) {
                $paymentMethod = PaymentMethod::factory()->create();
            } else {
                $paymentMethod = $paymentMethods->random(1)->first();
            }

            if (empty($years = Year::all())) {
                $year = Year::create([
                    'value' => date('Y'),
                ]);
            } else {
                $year = $years->random(1)->first();
            }

            if (empty($products = Product::all())) {
                $products = Product::factory()->count(5)->create();
            }

            $numberOfProducts = rand(1, 10);

            $builder->hasAttached(
                $products->random($numberOfProducts),
                function () {
                    return [
                        'amount' => rand(1, 10),
                    ];
                },
                'products'
            )->create([
                'year_id' => $year->id,
                'month_id' => $month = Month::inRandomOrder()->first()->id,
                'seller_id' => $companies->first()->id,
                'buyer_id' => $companies->last()->id,
                'payment_method_id' => $paymentMethod->id,
                'invoice_date' => Carbon::create($year->value, $month, $day = rand(1, 25)),
                'sell_date' => Carbon::create($year->value, $month, $day),
            ]);
        }
    }
}
