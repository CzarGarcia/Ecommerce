<?php

namespace App\Livewire\Forms\Admin\Options;

use App\Models\Option;
use Livewire\Form;

class NewOptionForm extends Form
{
    public $name;

    public $type = 1;

    public $createModal = false;

    public $features = [
        [
            'value' => '',
            'description' => '',
        ],
    ];

    public function rules()
    {

        $rules = [
            'newOption.name' => 'required',
            'newOption.type' => 'required|in:1,2',
            'newOption.features.*.value' => 'required',
            'newOption.features.*.description' => 'required',
        ];

        //IREALIZAMOS LA VALIDACION
        foreach ($this->features as $index => $feature) {
            $rules['features.'.$index.'.value'] = 'required';
            if ($this->type == 1) {
                $rules['features.'.$index.'.value'] = 'required';
            } else {
                $rules['features.'.$index.'.value'] = 'required|regex:/^#[a-f0-9]{6}$/i';
            }
            $rules['features.'.$index.'.description'] = 'required|max:255';
        }

        return $rules;
    }

    public function save()
    {

        $this->validate();

        $option = Option::create([
            'name' => $this->name,
            'type' => $this->type,
        ]);

        foreach ($this->features as $feature) {
            $option->features()->create([
                'value' => $feature['value'],
                'description' => $feature['description'],
            ]);
        }

        $this->reset();
    }

    public function removeFeature($index)
    {
        unset($this->features[$index]);
        $this->features = array_values($this->features);
    }

    public function addFeature()
    {
        $this->features[] = [
            'value' => '',
            'description' => '',
        ];
    }
}
