<?php

namespace App\Livewire\Admin\Options;

use App\Livewire\Forms\Admin\Options\NewOptionForm;
use App\Models\Option;
use Livewire\Component;

class ManageOptions extends Component
{
    public $options;

    public NewOptionForm $newOption;

    public function mount()
    {
        $this->options = Option::with('features')
            ->get();
    }

    public function addFeature()
    {
        $this->newOption->addFeature();
    }

    public function addOption()
    {

        $this->newOption->save();

        $this->options = Option::with('features')->get();

        $this->dispatch('swal:modal', [
            'title' => 'Opcion creada',
            'text' => 'Se ha creado la opcion correctamente',
            'type' => 'success',
            'timeout' => 3000,
        ]);
    }

    public function removeFeature($index)
    {
        $this->newOption->removeFeature($index);
    }

    public function render()
    {
        return view('livewire.admin.options.manage-options');
    }
}
