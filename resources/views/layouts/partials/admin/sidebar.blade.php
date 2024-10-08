@php

    $links = [
        [
            'icon' => 'fa-solid fa-chart-line',
            'name' => 'Dashboard',
            'route' => route('admin.admin.dashboard'),
            'active' => request()->routeIs('admin.admin.dashboard'),
        ],
        [
            'icon' => 'fa-solid fa-cog',
            'name' => 'Opciones',
            'route' => route('admin.options.index'),
            'active' => request()->routeIs('admin.options.*'),
        ],
        [
            'icon' => 'fa-solid fa-users',
            'name' => 'Familias',
            'route' => route('admin.families.index'),
            'active' => request()->routeIs('admin.families.*'),
        ],
        [
            'icon' => 'fa-solid fa-tags',
            'name' => 'Categorias',
            'route' => route('admin.categories.index'),
            'active' => request()->routeIs('admin.categories.*'),
        ],
        [
            'icon' => 'fa-solid fa-tag',
            'name' => 'Subcategorías',
            'route' => route('admin.subcategories.index'),
            'active' => request()->routeIs('admin.subcategories.*'),
        ],
        [
            'icon' => 'fa-solid fa-boxes-stacked',
            'name' => 'Productos',
            'route' => route('admin.products.index'),
            'active' => request()->routeIs('admin.products.*'),
        ],

    ];

@endphp



<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    :class="{ 'tanslate-x-0 ease-out': sidebarOpen, '-translate-x-full ease-in': !sidebarOpen }" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            @foreach ($links as $link)
                <li>
                    <a href="{{ $link['route'] }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ $link['active'] ? 'bg-gray-500' : '' }}">

                        <span class="inline-flex w-6 h-6 justify-center items-center"><i
                                class="{{ $link['icon'] }} text-gray"></i></span>
                        <span class="ms-2">{{ $link['name'] }}</span>

                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</aside>
