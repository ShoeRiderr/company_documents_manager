<?php

namespace Database\Seeders;

use App\Models\VatRate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VatRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => '-',
                'value' => '0',
            ],
            [
                'name' => 'np.',
                'value' => '0',
            ],
            [
                'name' => 'zw.',
                'value' => '0',
            ],
            [
                'name' => 'o.o.',
                'value' => '0',
            ],
            [
                'name' => '0%',
                'value' => '0',
            ],
            [
                'name' => '2.1%',
                'value' => '2.1',
            ],
            [
                'name' => '2.5%',
                'value' => '2.5',
            ],
            [
                'name' => '3%',
                'value' => '3',
            ],
            [
                'name' => '3.7%',
                'value' => '3.7',
            ],
            [
                'name' => '4%',
                'value' => '4',
            ],
            [
                'name' => '4.8%',
                'value' => '4.8',
            ],
            [
                'name' => '5%',
                'value' => '5',
            ],
            [
                'name' => '5.5%',
                'value' => '5.5',
            ],
            [
                'name' => '6%',
                'value' => '6',
            ],
            [
                'name' => '6.5%',
                'value' => '6.5',
            ],
            [
                'name' => '7%',
                'value' => '7',
            ],
            [
                'name' => '7.7%',
                'value' => '7.7',
            ],
            [
                'name' => '8%',
                'value' => '8',
            ],
            [
                'name' => '8.5%',
                'value' => '8.5',
            ],
            [
                'name' => '9%',
                'value' => '9',
            ],
            [
                'name' => '9.5%',
                'value' => '9.5',
            ],
            [
                'name' => '10%',
                'value' => '10',
            ],
            [
                'name' => '12%',
                'value' => '12',
            ],
            [
                'name' => '13%',
                'value' => '13',
            ],
            [
                'name' => '13.5%',
                'value' => '13.5',
            ],
            [
                'name' => '14%',
                'value' => '14',
            ],
            [
                'name' => '15%',
                'value' => '15',
            ],
            [
                'name' => '16%',
                'value' => '16',
            ],
            [
                'name' => '17%',
                'value' => '17',
            ],
            [
                'name' => '18%',
                'value' => '18',
            ],
            [
                'name' => '19%',
                'value' => '19',
            ],
            [
                'name' => '20%',
                'value' => '20',
            ],
            [
                'name' => '21%',
                'value' => '21',
            ],
            [
                'name' => '22%',
                'value' => '22',
            ],
            [
                'name' => '23%',
                'value' => '23',
            ],
            [
                'name' => '24%',
                'value' => '24',
            ],
            [
                'name' => '25%',
                'value' => '25',
            ],
            [
                'name' => '27%',
                'value' => '27',
            ],
        ];

        VatRate::insert($data);
    }
}
