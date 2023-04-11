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
                'cpf' => '02332467478',
                'birth' => '2000-06-06',
                'gender' => 'M',
            ],
            [
                'name' => 'Fulano de Tal', 
                'cpf' => '03232467479',
                'birth' => '2001-06-06',
                'gender' => 'M',
            ],
            [
                'name' => 'Ciclano de Tal', 
                'cpf' => '03232467480',
                'birth' => '2002-06-06',
                'gender' => 'M',
            ],
            [
                'name' => 'Beltrano de Tal', 
                'cpf' => '03232467490',
                'birth' => '2003-06-06',
                'gender' => 'M',
            ],
            [
                'name' => 'Zilano de tal', 
                'cpf' => '03232465278',
                'birth' => '2000-05-12',
                'gender' => 'M',
            ],
            [
                'name' => 'Murano de Tal', 
                'cpf' => '03232467478',
                'birth' => '2000-06-06',
                'gender' => 'M',
            ],
            [
                'name' => 'Bucano de Tal', 
                'cpf' => '03232467178',
                'birth' => '2015-06-10',
                'gender' => 'M',
            ],
            [
                'name' => 'Turano de Tal', 
                'cpf' => '02563396525',
                'birth' => '2021-12-12',
                'gender' => 'M',
            ],
            [
                'name' => 'Mariana da Silva', 
                'cpf' => '03235867478',
                'birth' => '2000-07-06',
                'gender' => 'F',
            ],
        ]);
    }
}
