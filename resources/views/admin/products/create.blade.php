<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.admin.dashboard'),
    ],
    [
        'name' => 'Prductos',
        'route' => route('admin.products.index'),
    ],
    [
        'name' => 'Crear' ,
    ],
]">

    @livewire('admin.products.product-create')

</x-admin-layout>
