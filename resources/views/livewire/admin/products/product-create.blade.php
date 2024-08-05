<div>





    <div class="bg-white rounded-lg shadow-lg p-6">
        <div>
            <form wire:submit='store'>

                <figure class="mb-4 relative">
                    <div class="absolute top-8 right-8">
                        <label class="flex items-center px-4 py-2 rounded-lg bg-white shadow-lg cursor-pointer">
                            <i class='fas fa-camera mr-2'></i>
                            Actualizar imagen
                            <input type="file" class="hidden" accept="image/*" wire:model='image'>
                        </label>
                    </div>

                    <img src="{{ $image ? $image->temporaryUrl() : asset('img/img.jpg') }}"
                        class="aspect-[16/9] object-cover object-center w-full">
                </figure>
                <div class="mb-4">

                    <x-validation-errors class="mb-4" :errors="$errors" />

                    <div class="mb-4">
                        <x-label class="mb-2">
                            Familias
                        </x-label>
                        <x-select wire:model.live='family_id'>
                            <option value="" disabled>Seleccione una familia</option>
                            @foreach ($families as $family)
                                <option value="{{ $family->id }}">{{ $family->name }}</option>
                            @endforeach
                        </x-select>
                        <x-label>
                        </x-label>
                    </div>

                    <div class="mb-4">
                        <x-label class="mb-2">
                            Categorias
                        </x-label>


                        <x-select name="category_id" class="w-full" wire:model.live='category_id'>
                            <option value="" disabled>Seleccione una categoria</option>
                            @foreach ($this->categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </x-select>


                    </div>


                    <div class="mb-4">
                        <x-label class="mb-2">
                            Subcategorias
                        </x-label>


                        <x-select name="subcategory_id" class="w-full" wire:model.live='product.subcategory_id'>
                            <option value="" disabled>Seleccione una categoria</option>
                            @foreach ($this->subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                            @endforeach
                        </x-select>


                    </div>


                    <div class="mb-4">
                        <x-label class="mb-2">
                            Nombre
                        </x-label>
                        <x-input class="w-full" placeholder="Ingrese el nombre del producto"
                            wire:model='product.name' />
                    </div>
                    <div class="mb-4">
                        <x-label class="mb-2">
                            Sku
                        </x-label>
                        <x-input class="w-full" placeholder="Ingrese el sku del Producto" wire:model='product.sku' />
                    </div>
                    <div class="mb-4">
                        <x-label class="mb-2">
                            Descripción
                        </x-label>
                        <x-text-area class="w-full" placeholder="Ingrese la descripción del producto"
                            wire:model='product.description' />
                    </div>
                    <div class="mb-4">
                        <x-label class="mb-2">
                            Precio
                        </x-label>
                        <x-input type="number" step="0.01"
                         class="w-full" placeholder="Ingrese el precio del Producto"
                            wire:model='product.price' />
                    </div>

                </div>
                <div class="flex justify-end">
                    <button
                        class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                        <span
                            class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                            Guardar
                        </span>
                    </button>
                </div>

            </form>
            {{-- @dump($category_id, $family_id, $product) --}}
        </div>

    </div>

</div>
