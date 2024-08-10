<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.admin.dashboard'),
    ],
    [
        'name' => 'Opciones',
    ],
]">


@livewire('admin.options.manage-options')




</x-admin-layout>

