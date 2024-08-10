<?php

namespace App\Livewire\Admin\Options;

use App\Models\Option;
use Livewire\Component;

class ManageOptions extends Component
{

    public $options;
    public $createModal = true;
    public $newOption = [
        'name' => '',
        'type' => 1,
        'features' => [
            [

                'value' => '',
                'description' => ''
            ],
        ]
    ];



    public function mount()
    {
        $this->options = Option::with('features')
            ->get();
    }

    public function addFeature()
    {
        $this->newOption['features'][] =
            [
                'value' => '',
                'description' => ''
            ];
    }

    public function removeFeature($index)
    {
        unset($this->newOption['features'][$index]);
        $this->newOption['features'] = array_values($this->newOption['features']);
    }



    public function render()
    {
        return view('livewire.admin.options.manage-options');
    }
}
