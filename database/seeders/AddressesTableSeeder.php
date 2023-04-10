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
            ],
            [
                'city_id' => '3828',
            ],
            [
                'city_id' => '3241',
            ],
            [
                'city_id' => '4397',
            ],
        ]);
    }
}
