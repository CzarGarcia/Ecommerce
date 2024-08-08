<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OptionSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $options = [
            [
            'name' => 'Talla',
            'type' => 1,
            'features' => [
                [
                'value' => 'S',
                'description' => 'Pequeña',
                ],
                [
                'value' => 'M',
                'description' => 'Mediana',
                ],
                [
                'value' => 'L',
                'description' => 'Grande',
                ]
            ],
            [
            'name' => 'Color',
            'type' => 2,
            'features' => [
                [
                'value' => '#FF0000',
                'description' => 'Rojo',
                ],
                [
                'value' => '#0000FF',
                'description' => 'Azul',
                ],
                [
                'value' => '#00FF00',
                'description' => 'Verde',
                ]
            ],
            [
            'name' => 'sexo',
            'type' => 3
            ],


        ];
    }
}
