<?php

namespace Database\Seeders;

use App\Models\Tariff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TariffsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $tariff = [
            [
                'id' => 1,
                'price' => '4950',
                'month' => 0,
                'type' => 'basic',
                'status' => 1
            ],
            [
                'id' => 2,
                'price' => '35000',
                'month' => 4,
                'type' => 'standart',
                'status' => 1

            ],
            [
                'id' => 3,
                'price' => '73000',
                'month' => 15,
                'type' => 'premium',
                'status' => 1

            ]
        ];

        foreach ($tariff as $key => $item) {
            Tariff::updateOrCreate([
                'id' => $item['id'],
                'price' => $item['price'],
                'month' => $item['month'],
                'status' => $item['status']

            ]);

        }
    }
}
