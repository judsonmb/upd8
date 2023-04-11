<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('customers')->insert([
            [
                'name' => 'Wesley Barbosa', 
                'cpf' => '378.658.658-00',
                'birth' => '1990-06-06',
                'gender' => 'M',
            ],
            [
                'name' => 'Ricardo Menezes', 
                'cpf' => '326.652.654-00',
                'birth' => '1980-06-06',
                'gender' => 'M',
            ],
            [
                'name' => 'Margaret Hamil', 
                'cpf' => '235.326.148-12',
                'birth' => '1995-06-06',
                'gender' => 'F',
            ],
            [
                'name' => 'Joan Clarke', 
                'cpf' => '032.324.674-78',
                'birth' => '2000-06-06',
                'gender' => 'M',
            ],
        ]);
    }
}
