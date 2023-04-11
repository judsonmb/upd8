<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('addresses')->insert([
            [
                'city_id' => '3478',
                'customer_id' => '1',
            ],
            [
                'city_id' => '3828',
                'customer_id' => '2',
            ],
            [
                'city_id' => '3241',
                'customer_id' => '3',
            ],
            [
                'city_id' => '4397',
                'customer_id' => '4',
            ],
            [
                'city_id' => '23',
                'customer_id' => '5',
            ],
            [
                'city_id' => '1000',
                'customer_id' => '6',
            ],
            [
                'city_id' => '678',
                'customer_id' => '7',
            ],
            [
                'city_id' => '876',
                'customer_id' => '8',
            ],
            [
                'city_id' => '456',
                'customer_id' => '9',
            ],
            [
                'city_id' => '5000',
                'customer_id' => '10',
            ],
            [
                'city_id' => '5001',
                'customer_id' => '11',
            ],
            [
                'city_id' => '5002',
                'customer_id' => '12',
            ],
        ]);
    }
}
