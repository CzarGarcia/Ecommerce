<?php

namespace App\Livewire\Admin\Products;

use App\Models\Category;
use App\Models\Family;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductEdit extends Component
{

    use WithFileUploads;

    public $product;
    public $productEdit;

    public $image;

    public $families;
    public $family_id = '';
    public $category_id = '';


    public function mount($product)
    {
       $this->productEdit = $product->only('sku','name', 'description', 'price','image_path','subcategory_id');
       $this->families = Family::all();

       $this->category_id = $product->subcategory->category->id;
       $this->family_id = $product->subcategory->category->family_id;
    }

    public function boot()
    {
        $this->withValidator(function ($validator){
            if($validator->fails()){
                $this->dispatch('swal', [
                    'icon' => 'success',
                    'title' => 'El producto no se actualizó',
                    'text' => 'No se pudo editar el producto, verifica los campos',
                ]);
            }
        });
    }

    public function updatedFamilyId($value)
    {
        $this->family_id = '';
        $this->productEdit['subcategory_id'] = '';
    }

    public function updatedCategoryId($value)
    {
        $this->productEdit['subcategory_id'] = '';
    }

    #[Computed()]
    public function categories()
    {
        return Category::where('family_id', $this->family_id)->get();
    }

    #[Computed()]
    public function subcategories()
    {
        return Subcategory::where('category_id', $this->category_id)->get();
    }

    public function store()
    {
        $this->validate([
            'productEdit.sku' => 'required|unique:products,sku, '.$this->product->id,
            'productEdit.name' => 'required',
            'productEdit.description' => 'required',
            'productEdit.price' => 'required|numeric|min:0',
            'productEdit.subcategory_id' => 'required',
            'image' => 'nullable|image|max:1024',
        ]);

        if($this->image){
            Storage::delete($this->productEdit['image_path']);
            $this->productEdit['image_path'] = $this->image->store('products');
        }

        $this->product->update($this->productEdit);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Producto actualizado',
            'text' => 'El producto se actualizó correctamente',
        ]);


        return redirect()->route('admin.products.edit', $this->product);

    }

    public function render()
    {
        return view('livewire.admin.products.product-edit');
    }
}


