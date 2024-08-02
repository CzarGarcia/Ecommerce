<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.admin.dashboard'),
    ],
    [
        'name' => 'Categorias',
        'route' => route('admin.categories.index'),
    ],
    [
        'name' => 'Editar - ' . $category->name,
    ],
]">


<div class="card">

    <div class="bg-white rounded-lg shadow-lg p-6">
        <form action="{{ route('admin.categories.update', $category) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <x-validation-errors class="mb-4" :errors="$errors" />

                <x-label class="mb-2">
                    Nombre
                </x-label>
                <x-input class="w-full" placeholder="Ingrese el nombre de la familia" name="name"
                    value="{{ old('name', $category) }}" />
            </div>
            <div class="mb-4">
                <x-label class="mb-2">
                    Categoria
                </x-label>
                <x-select name="family_id" id="family_id" class="w-full">
                    @foreach ($families as $family)
                    <option value="{{ $family->id }}"
                        @selected(old('family_id', $category->family_id) == $family->id)>
                        {{ $family->name }}
                    </option>
                @endforeach
                </x-select>
            </div>
            <div class="flex justify-end">
                <button
                    class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                    <span
                        class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        Guardar</span>
                </button>
            </div>

        </form>

    </div>

</div>
</x-admin-layout>
