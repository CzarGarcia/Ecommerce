<div>
    <x-dialog-modal wire:model="createModal">

        <x-slot name="title">
            Crear nueva opción
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-2 gap-6 mb-4">

                <div>
                    <x-label class="px-2 mb-2">
                        Nombre
                    </x-label>
                    <x-input class="w-full" wire:model="newOption.name" placeholder="Ejemplo: Tamaño, color" />
                </div>
                <div>
                    <x-label class="px-2 mb-2">
                        Tipo
                    </x-label>
                    <x-select wire:model.live="newOption.type" class="w-full">
                        <option value="1">Etiqueta</option>
                        <option value="2">Color</option>
                        <option value="3">Número</option>
                    </x-select>
                </div>
            </div>

            <div class="flex items-center mb-4">
                <hr class="flex-1">
                <span class="mx-3">Valores</span>
                <hr class="flex-1">
            </div>

            <div class="mb-4 space-y-4">
                @foreach ($newOption['features'] as $index => $feature)
                    <div wire:key="features-{{ $index }}" class="p-6 rounded-lg border border-gray-200 relative">

                        <div class="absolute -top-3  bg-white">
                            <button wire:click="removeFeature({{ $index }})"
                             class="relative inline-flex items-center justify-center p-0.5 mb-2 me-1 overflow-hidden text-sm font-medium text-red-900 rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-red text-red focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800">
                                <span class="relative px-1 py-0.5 transition-all ease-in duration-75 bg-red-100 rounded-md group-hover:bg-opacity-0 text-red-500">
                                    <i class="fa-solid fa-trash-can"></i>
                                </span>
                            </button>
                        </div>

                        <div class="grid grid-cols-2 gap-6 mb-4">
                            <div>
                                <x-label class="mb-2">
                                    Valor
                                </x-label>

                                @switch($newOption['type'])
                                    @case(1)

                                    <x-input class="w-full" wire:model="newOption.features.{{ $index }}.value"
                                    placeholder="Ingresa el valor de la opción" />

                                        @break
                                    @case(2)
                                    <div class="border border-gray-300 rounded-md h-[42px] flex items-center justify-between px-3">

                                        {{ $newOption['features'][$index]['value'] ?: 'Seleccione un color' }}

                                        <input type="color" wire:model.live="newOption.features.{{ $index }}.value" class="">

                                    </div>
                                    @break
                                    @default

                                @endswitch
                            </div>

                            <div>
                                <x-label class="mb-2">
                                    Descripción
                                </x-label>
                                <x-input class="w-full" wire:model="newOption.features.{{ $index }}.description"
                                    placeholder="Ingresa la descripción" />
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="flex justify-end">
                <button wire:click="addFeature"
                    class="relative inline-flex items-center justify-center text-purple-400 p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300">
                    <span
                        class="relative px-1 py-0.5 transition-all ease-in duration-75 bg-purple-100 rounded-md group-hover:bg-opacity-0">
                        <a>
                            <i class="fa-solid fa-add"> </i>
                        </a>
                    </span>
                </button>
            </div>

        </x-slot>

        <x-slot name="footer">
            <!-- Contenido del pie de página -->
        </x-slot>

    </x-dialog-modal>

    <section class="rounded-lg bg-white shadow-lg">

        <header class="border-b border-gray-200 px-6 py-2">
            <div class="flex justify-between">
                <h1 class="text-lg font-semibold text-gray-700">Opciones</h1>

                <button wire:click="$set('createModal', true)"
                    class="relative inline-flex items-center justify-center text-purple-400 p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300">
                    <span
                        class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-purple-100 rounded-md group-hover:bg-opacity-0">
                        <a>
                            Nuevo
                        </a>
                    </span>
                </button>
            </div>
        </header>

        <div class="p-6">
            <div class="space-y-6">
                @foreach ($options as $option)
                    <div class="p-6 rounded-lg border border-gray-200 relative">
                        <div class="absolute -top-3 bg-white px-3">
                            <span>
                                {{ $option->name }}
                            </span>
                        </div>

                        <div class="flex flex-wrap">
                            @foreach ($option->features as $feature)
                                @switch($option->type)
                                    @case(1)
                                        <span
                                            class="bg-purple-100 text-purple-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded border border-purple-400">
                                            {{ $feature->description }}
                                        </span>
                                    @break

                                    @case(2)
                                        <span class="inline-block h-6 w-6 shadow-lg rounded-full border-2 border-gray-300 mr-4"
                                            style="background-color: {{ $feature->value }}"></span>
                                    @break

                                    @case(3)
                                        <span
                                            class="bg-purple-100 text-purple-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded border border-purple-400">
                                            {{ $feature->value }}
                                        </span>
                                    @break

                                    @default
                                @endswitch
                            @endforeach

                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>
</div>
