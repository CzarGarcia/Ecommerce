<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.admin.dashboard'),
    ],
    [
        'name' => 'Familias',
        'route' => route('admin.families.index'),
    ],
    [
        'name' => 'Editar - ' . $family->name,
    ],
]">

    <div class="bg-white rounded-lg shadow-lg p-6">
        <form action="{{ route('admin.families.update', $family) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <x-label class="mb-2">
                    Nombre
                </x-label>
                <x-input class="w-full" placeholder="Ingrese el nombre de la familia" name="name"
                    value="{{ old('name', $family->name) }}" />
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
                        Actualizar</span>
                </button>


            </div>

        </form>

    </div>

    <form action="{{ route('admin.families.destroy', $family) }}" method="POST" id="delete-form">

        @csrf
        @method('DELETE')


    </form>

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

</x-admin-layout>
