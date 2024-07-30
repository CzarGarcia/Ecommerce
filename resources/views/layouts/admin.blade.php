@props(['breadcrumbs' => []])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/db70252adb.js" crossorigin="anonymous"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles


    <style>

        .custom-swal-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem;
            margin-bottom: 0.5rem;
            margin-right: 0.5rem;
            overflow: hidden;
            font-size: 0.875rem;
            font-weight: 500;
            text-align: center;
            color: #1f2937; /* text-gray-900 */
            border-radius: 0.5rem; /* rounded-lg */
            background-image: linear-gradient(to bottom right, #ec4899, #fb923c); /* from-pink-500 to-orange-400 */
            transition: all 0.3s ease-in-out;
        }

        .custom-swal-button:hover {
            color: #ffffff; /* hover:text-white */
            background-image: linear-gradient(to bottom right, #ec4899, #fb923c); /* group-hover:from-pink-500 group-hover:to-orange-400 */
        }

        .custom-swal-button:focus {
            outline: none;
            box-shadow: 0 0 0 4px rgba(236, 72, 153, 0.2); /* focus:ring-pink-200 */
        }
    </style>
</head>

<body class="font-sans antialiased" x-data="{ sidebarOpen: false }">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 z-20 sm:hidden" style="display: none" x-show="sidebarOpen"
        @click="sidebarOpen = !sidebarOpen">
    </div>
    @include('layouts.partials.admin.navigation')

    @include('layouts.partials.admin.sidebar')


    <div class="p-4 sm:ml-64">

        <div class="mt-14">

            <div class="flex justify-between items-center">
                @include('layouts.partials.admin.breadcrumb')

                @isset($action)
                    <div>
                        {{ $action }}
                    </div>
                @endisset

            </div>


            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 ">



                {{ $slot }}


            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- @stack('modals') --}}

    @livewireScripts

    @stack('js')

    @if (session('swal'))
        <script>
            Swal.fire({!! json_encode(session('swal')) !!});
        </script>
    @endif


</body>

</html>
