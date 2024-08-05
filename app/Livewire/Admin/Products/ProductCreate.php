<?php

namespace App\Livewire\Admin\Products;

use App\Models\Category;
use App\Models\Family;
use App\Models\Product;
use App\Models\Subcategory;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductCreate extends Component
{
    use WithFileUploads;


    public $families;
    public $family_id = '';
    public $category_id = '';

    public $image;
    public $product = [
        'sku' => '',
        'name' => '',
        'description' => '',
        'image_path' => '',
        'price' => '',
        'subcategory_id' => '',

    ];

    public function mount()
    {
        $this->families = Family::all();
    }

    public function boot(){
        $this->withValidator(function ($validator){
            if($validator->fails()){
                $this->dispatch('swal',[
                    'icon' => 'error',
                    'title' => 'Error',
                    'text' => 'Hay errores en el formulario',
                ]);
            }
        });
    }

    #[Computed()]
    public function categories()
    {
        return Category::where('family_id', $this->family_id)->get();
    }

    public function updateFamilyId()
    {
        $this->category_id= '';
    }

    public function updateCategoryId()
    {
        $this->product['subcategory_id'] = '';
    }
    #[Computed()]
    public function subcategories()
    {
        return Subcategory::where('category_id', $this->category_id)->get();
    }

    public function render()
    {
        return view('livewire.admin.products.product-create');
    }

    public function store()
    {
        $this->validate([
            'product.subcategory_id' => 'required|exists:subcategories,id',
            'product.sku' => 'required|unique:products,sku',
            'product.name' => 'required|max:255',
            'product.description' => 'required',
            'product.price' => 'required|numeric|min:0',
            'image' => 'required|image|max:1024',
        ],[],[
            'family_id' => 'Famila',
            'category_id' => 'Categoria',
            'product.subcategory_id' => 'Subcategoria',
            'product.sku' => 'SKU',
            'product.name' => 'Nombre',
            'product.description' => 'Descripción',
            'product.price' => 'Precio',
        ]);

        $this->product['image_path'] = $this->image->store('public/products');

        $product =Product::create($this->product);

        session()->flash('swal',[
            'icon' => 'success',
            'title' => 'Producto creado',
            'text' => 'Producto creado correctamente',
        ]);

        return redirect()->route('admin.products.edit', $product);


    }
}
