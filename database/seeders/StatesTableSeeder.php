<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('states')->insert([
            [
                'name' => 'AC', 
            ],
            [
                'name' => 'AL', 
            ],
            [
                'name' => 'AM', 
            ],
            [
                'name' => 'AP', 
            ],
            [
                'name' => 'BA', 
            ],
            [
                'name' => 'CE', 
            ],
            [
                'name' => 'DF', 
            ],
            [
                'name' => 'ES', 
            ],
            [
                'name' => 'GO', 
            ],
            [
                'name' => 'MA', 
            ],
            [
                'name' => 'MG', 
            ],
            [
                'name' => 'MS', 
            ],
            [
                'name' => 'MT', 
            ],
            [
                'name' => 'PA', 
            ],
            [
                'name' => 'PB', 
            ],
            [
                'name' => 'PE', 
            ],
            [
                'name' => 'PI', 
            ],
            [
                'name' => 'PR', 
            ],
            [
                'name' => 'RJ', 
            ],
            [
                'name' => 'RN', 
            ],
            [
                'name' => 'RO', 
            ],
            [
                'name' => 'RR', 
            ],
            [
                'name' => 'RS', 
            ],
            [
                'name' => 'SC', 
            ],
            [
                'name' => 'SE', 
            ],
            [
                'name' => 'SP', 
            ],
            [
                'name' => 'TO', 
            ],
        ]);
    }
}
