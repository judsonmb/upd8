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
        ]);
    }
}
