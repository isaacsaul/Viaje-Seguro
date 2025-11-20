<div class="bg-[#eff2f2] min-h-screen py-2">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Barra de búsqueda y botones -->
        <div class="bg-white rounded-xl shadow-md p-6 mb-8">
            <div class="flex flex-col sm:flex-row items-center gap-4">
                <div class="relative flex-1 w-full">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-[#777779]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input type="text"
                        class="w-full pl-10 pr-4 py-3 border border-[#a4b0af] rounded-lg focus:ring-[#28b0a3] focus:border-[#28b0a3] text-[#5d5c64] placeholder-[#8c9494]"
                        placeholder="Escribe para buscar"
                        wire:model="search">
                </div>

                <button class="px-6 py-3 bg-[#28b0a3] hover:bg-[#6acbc3] text-white rounded-lg transition-all duration-300 flex items-center justify-center gap-2 font-medium shadow-md hover:shadow-lg transform hover:scale-[1.02]"
                    wire:click="toggleDeleted">
                    <i class="fas fa-sync-alt"></i>
                    {{ $showDeleted ? 'Mostrar Activos' : 'Mostrar Eliminados' }}
                </button>

                <div class="w-full sm:w-auto">
                    @livewire('create-linea')
                </div>
            </div>
        </div>

        @if ($lineas->count())
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-[#a4b0af]/20">
                        <thead class="bg-[#eff2f2]">
                            <tr>
                                <th scope="col" class="group px-6 py-4 text-left">
                                    <div class="flex items-center gap-2 cursor-pointer" wire:click="order('codigo')">
                                        <span class="text-xs font-medium text-[#5d5c64] uppercase tracking-wider hover:text-[#28b0a3] transition-colors duration-300">Código</span>
                                        <i class="fas fa-sort text-[#777779] group-hover:text-[#28b0a3]"></i>
                                    </div>
                                </th>
                                <th scope="col" class="group px-6 py-4 text-left">
                                    <div class="flex items-center gap-2 cursor-pointer" wire:click="order('tipovehiculo')">
                                        <span class="text-xs font-medium text-[#5d5c64] uppercase tracking-wider hover:text-[#28b0a3] transition-colors duration-300">Tipo de Vehículo</span>
                                        <i class="fas fa-sort text-[#777779] group-hover:text-[#28b0a3]"></i>
                                    </div>
                                </th>
                                <th scope="col" class="group px-6 py-4 text-left">
                                    <div class="flex items-center gap-2 cursor-pointer" wire:click="order('descripcion')">
                                        <span class="text-xs font-medium text-[#5d5c64] uppercase tracking-wider hover:text-[#28b0a3] transition-colors duration-300">Descripción</span>
                                        <i class="fas fa-sort text-[#777779] group-hover:text-[#28b0a3]"></i>
                                    </div>
                                </th>
                                <th scope="col" class="group px-6 py-4 text-left">
                                    <div class="flex items-center gap-2 cursor-pointer" wire:click="order('grupo_id')">
                                        <span class="text-xs font-medium text-[#5d5c64] uppercase tracking-wider hover:text-[#28b0a3] transition-colors duration-300">Código Grupo</span>
                                        <i class="fas fa-sort text-[#777779] group-hover:text-[#28b0a3]"></i>
                                    </div>
                                </th>
                                <th scope="col" class="group px-6 py-4 text-left hidden lg:table-cell">
                                    <div class="flex items-center gap-2">
                                        <span class="text-xs font-medium text-[#5d5c64] uppercase tracking-wider">Desc. Grupo</span>
                                    </div>
                                </th>
                                <th scope="col" class="group px-6 py-4 text-left hidden xl:table-cell">
                                    <div class="flex items-center gap-2">
                                        <span class="text-xs font-medium text-[#5d5c64] uppercase tracking-wider">Fecha Fund.</span>
                                    </div>
                                </th>
                                <th scope="col" class="group px-6 py-4 text-left hidden lg:table-cell">
                                    <div class="flex items-center gap-2">
                                        <span class="text-xs font-medium text-[#5d5c64] uppercase tracking-wider">Encargado</span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-4 text-right">
                                    <span class="text-xs font-medium text-[#5d5c64] uppercase tracking-wider">Acciones</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#a4b0af]/20">
                            @foreach ($lineas as $linea)
                                <tr class="hover:bg-[#eff2f2]/50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-[#1e1e1f] font-medium">{{$linea->codigo}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-[#5d5c64]">{{$linea->tipovehiculo}}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-[#5d5c64] line-clamp-2">{{$linea->descripcion}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-[#5d5c64]">{{ $linea->grupo->codgrupo }}</div>
                                    </td>
                                    <td class="px-6 py-4 hidden lg:table-cell">
                                        <div class="text-sm text-[#5d5c64] line-clamp-2">{{ $linea->grupo->descripcion }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap hidden xl:table-cell">
                                        <div class="text-sm text-[#777779]">
                                            {{ $linea->grupo->fechafundacion ? \Carbon\Carbon::parse($linea->grupo->fechafundacion)->format('d/m/Y') : '-' }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 hidden lg:table-cell">
                                        <div class="text-sm text-[#5d5c64]">{{ $linea->grupo->encargado }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        <div class="flex items-center justify-end gap-3">
                                            <div>
                                                @livewire('edit-linea', ['linea' => $linea], key($linea->id))
                                            </div>
                                            <div>
                                                @if ($showDeleted)
                                                    <button class="p-2 bg-[#28b0a3] text-white rounded-lg hover:bg-[#6acbc3] transition-all duration-300 shadow-sm hover:shadow-md transform hover:scale-[1.02]"
                                                        wire:click="restore({{ $linea->id }})">
                                                        <i class="fas fa-undo"></i>
                                                    </button>
                                                @else
                                                    <button class="p-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-all duration-300 shadow-sm hover:shadow-md transform hover:scale-[1.02]"
                                                        wire:click="$emit('deleteLinea', {{$linea->id}})">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="bg-white rounded-xl shadow-md p-8 text-center">
                <div class="flex flex-col items-center justify-center gap-3">
                    <svg class="w-12 h-12 text-[#777779]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    <p class="text-lg font-medium text-[#5d5c64]">No existen líneas registradas</p>
                </div>
            </div>
        @endif
    </div>
</div>

<style>
    /* Estilos para efectos hover suaves */
    .transition-all {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 300ms;
    }

    .hover\:scale-\[1\.02\]:hover {
        transform: scale(1.02);
    }

    /* Estilos para sombras */
    .shadow-md {
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    .hover\:shadow-lg:hover {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }

    /* Estilos para truncar texto */
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>