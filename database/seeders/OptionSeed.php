<?php

namespace Database\Seeders;

use App\Models\Option;
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
                    ],
                ],
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
                    ],
                ],
            ],
            [
                'name' => 'sexo',
                'type' => 3,
                'features' => [
                    [
                        'value' => 'H',
                        'description' => 'Hombre',
                    ],
                    [
                        'value' => 'M',
                        'description' => 'Mujer',
                    ],
                    [
                        'value' => 'U',
                        'description' => 'Unisex',
                    ],
                ],
            ],
        ];


        foreach ($options as $option) {
            $optionModel = Option::create([
                'name' => $option['name'],
                'type' => $option['type'],
            ]);

            foreach ($option['features'] as $feature) {
                $optionModel->features()->create([
                    'option_id' => $optionModel->id,
                    'value' => $feature['value'],
                    'description' => $feature['description'],
                ]);
            }
        }

    }
}
