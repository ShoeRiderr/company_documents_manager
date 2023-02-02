<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ClientSeeder::class,
            MonthSeeder::class,
            YearSeeder::class,
            PaymentMethodSeeder::class,
            ProductSeeder::class,
            CitySeeder::class,
            CompanySeeder::class,
            InvoiceSeeder::class,
        ]);
    }
}
