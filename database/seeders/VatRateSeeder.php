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
                'name' => '',
                'value' => '-',
            ],
            [
                'name' => 'Nie podlega opodatkowaniu',
                'value' => 'np.',
            ],
            [
                'name' => 'Zwolniony z opodatkowania',
                'value' => 'zw.',
            ],
            [
                'name' => 'Odwrotne obciążenie',
                'value' => 'o.o.',
            ],
            [
                'name' => '',
                'value' => '0',
            ],
            [
                'name' => '',
                'value' => '2.1',
            ],
            [
                'name' => '',
                'value' => '2.5',
            ],
            [
                'name' => '',
                'value' => '3',
            ],
            [
                'name' => '',
                'value' => '3.7',
            ],
            [
                'name' => '',
                'value' => '4',
            ],
            [
                'name' => '',
                'value' => '4.8',
            ],
            [
                'name' => '',
                'value' => '5',
            ],
            [
                'name' => '',
                'value' => '5.5',
            ],
            [
                'name' => '',
                'value' => '6',
            ],
            [
                'name' => '',
                'value' => '6.5',
            ],
            [
                'name' => '',
                'value' => '7',
            ],
            [
                'name' => '',
                'value' => '7.7',
            ],
            [
                'name' => '',
                'value' => '8',
            ],
            [
                'name' => '',
                'value' => '8.5',
            ],
            [
                'name' => '',
                'value' => '9',
            ],
            [
                'name' => '',
                'value' => '9.5',
            ],
            [
                'name' => '',
                'value' => '10',
            ],
            [
                'name' => '',
                'value' => '12',
            ],
            [
                'name' => '',
                'value' => '13',
            ],
            [
                'name' => '',
                'value' => '13.5',
            ],
            [
                'name' => '',
                'value' => '14',
            ],
            [
                'name' => '',
                'value' => '15',
            ],
            [
                'name' => '',
                'value' => '16',
            ],
            [
                'name' => '',
                'value' => '17',
            ],
            [
                'name' => '',
                'value' => '18',
            ],
            [
                'name' => '',
                'value' => '19',
            ],
            [
                'name' => '',
                'value' => '20',
            ],
            [
                'name' => '',
                'value' => '21',
            ],
            [
                'name' => '',
                'value' => '22',
            ],
            [
                'name' => '',
                'value' => '23',
            ],
            [
                'name' => '',
                'value' => '24',
            ],
            [
                'name' => '',
                'value' => '25',
            ],
            [
                'name' => '',
                'value' => '27',
            ],
        ];

        VatRate::insert($data);
    }
}
