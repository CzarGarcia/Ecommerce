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
                        <x-select wire:model.live='subcategoryEdit.family_id'>
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
                        <x-select name="category_id" class="w-full" wire:model.live='subcategoryEdit.category_id'>
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
                        <x-input class="w-full" placeholder="Ingrese el nombre de la subcategoria"
                            wire:model='subcategoryEdit.name' />
                    </div>

                </div>

                <div class="flex justify-end">


                    <button
                        class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800"
                        onclick="confirmDelete(event)">
                        <span
                            class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                            Eliminar
                        </span>
                    </button>


                    <button
                        class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                        <span
                            class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                            Actualizar
                        </span>
                    </button>
                </div>


            </form>
            <form action="{{ route('admin.subcategories.destroy', $subcategory) }}" method="POST" id="delete-form">

                    @csrf
                    @method('DELETE')

            </form>


        </div>
        <div>

        </div>
    </div>



    @push('js')
        <script>
            function confirmDelete(event) {
                event.preventDefault(); // Evitar el comportamiento por defecto del botón
                //
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "custom-swal-button", // Aplicar la clase CSS aquí
                        cancelButton: "custom-swal-button" // Aplicar la clase CSS aquí
                    },
                    buttonsStyling: false
                });

                swalWithBootstrapButtons.fire({
                    title: "¿Estás seguro?",
                    text: "¡No podrás revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Sí, ¡eliminar!",
                    cancelButtonText: "No, cancelar",
                    reverseButtons: true,
                    backdrop: `
                    rgba(0,0,123,0.4)
                    url("/PYh.gif")
                    left top
                    no-repeat
                    `
                }).then((result) => {
                    if (result.isConfirmed) {
                        swalWithBootstrapButtons.fire({
                            title: "¡Eliminado!",
                            text: "Tu archivo ha sido eliminado.",
                            icon: "success"
                        });
                        document.getElementById('delete-form').submit();
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        swalWithBootstrapButtons.fire({
                            title: "Cancelado",
                            text: "Tu archivo está a salvo :)",
                            icon: "error"
                        });
                    }
                });
            }
        </script>
    @endpush

</div>
