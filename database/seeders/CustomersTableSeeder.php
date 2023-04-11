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
                'cpf' => '37865865800',
                'birth' => '1990-06-06',
                'gender' => 'M',
            ],
            [
                'name' => 'Ricardo Menezes', 
                'cpf' => '32665265400',
                'birth' => '1980-06-06',
                'gender' => 'M',
            ],
            [
                'name' => 'Margaret Hamil', 
                'cpf' => '23532614812',
                'birth' => '1995-06-06',
                'gender' => 'F',
            ],
            [
                'name' => 'Joan Clarke', 
                'cpf' => '03232467478',
                'birth' => '2000-06-06',
                'gender' => 'M',
            ],
        ]);
    }
}
