<?php

namespace App\Livewire\Admin\Subcategories;

use App\Models\Family;
use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Attributes\Computed;
use Livewire\Component;

class SubcategoryCreate extends Component
{
    public $families;

    public $subcategory = [
        'family_id' => '',
        'category_id' => '',
        'name' => '',
    ];


    public function render()
    {
        return view('livewire.admin.subcategories.subcategory-create');
    }

    public function mount()
    {
        $this->families = Family::all();
        
    }

    #[Computed()]
    public function categories()
    {
        return Category::where('family_id', $this->subcategory['family_id'])->get();
    }

    public function updatedSubcategoryFamilyId(){
        $this->subcategory['category_id'] = '';
    }

    public function save()
    {
        $this->validate([
            'subcategory.family_id' => 'required',
            'subcategory.category_id' => 'required',
            'subcategory.name' => 'required',
        ],[],[
            'subcategory.family_id' => 'Familia',
            'subcategory.category_id' => 'Categoria',
            'subcategory.name' => 'Nombre',
        ]);

        Subcategory::create($this->subcategory);

        
        session()->flash('swal',[
            'icon' => 'success',
            'title' => 'Categoría creada',
            'text' => 'Categoría creada correctamente',
        ]);
    
        return redirect()->route('admin.subcategories.index');
    }
  
}
