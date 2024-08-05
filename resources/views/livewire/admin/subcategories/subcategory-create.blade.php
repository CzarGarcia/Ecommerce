<div>
    <div class="bg-white rounded-lg shadow-lg p-6">
        <div>
            <form wire:submit='save'>
                <div class="mb-4">

                    <x-validation-errors class="mb-4" :errors="$errors" />

                    <div class="mb-4">
                        <x-label class="mb-2">
                            Familias
                        </x-label>
                        <x-select wire:model.live='subcategory.family_id'>
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
                        <x-select name="category_id" class="w-full" wire:model.live='subcategory.category_id'>
                            <option value="" disabled>Seleccione una categoria</option>
                            @foreach ($this->categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </x-select>
                    </div>

                    <div class="mb-4">
                        <x-label class="mb-2">
                            Subcategoria
                        </x-label>
                        <x-input class="w-full" placeholder="Ingrese el nombre de la subcategoria" wire:model='subcategory.name'/>
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

        </div>

    </div>

</div>
