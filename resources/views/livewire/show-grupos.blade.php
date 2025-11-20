<div class="bg-[#eff2f2] min-h-screen py-2">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Barra de búsqueda y botones -->
        <div class="bg-white rounded-xl shadow-md p-6 mb-8">
            <div class="flex flex-col sm:flex-row items-center gap-4">
                <div class="relative flex-1 w-full">
                    <input type="text"
                        class="w-full pl-4 pr-10 py-3 border border-[#a4b0af] rounded-lg focus:ring-[#28b0a3] focus:border-[#28b0a3] text-[#5d5c64] placeholder-[#8c9494]"
                        placeholder="Escribe para buscar"
                        wire:model="search">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                        <svg class="h-5 w-5 text-[#777779]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </div>

                <button class="px-6 py-3 bg-[#28b0a3] hover:bg-[#6acbc3] text-white rounded-lg transition-all duration-300 flex items-center justify-center gap-2 font-medium shadow-md hover:shadow-lg transform hover:scale-[1.02]"
                    wire:click="toggleDeleted">
                    <i class="fas fa-exchange-alt"></i>
                    {{ $showDeleted ? 'Mostrar Activos' : 'Mostrar Eliminados' }}
                </button>

                <div class="w-full sm:w-auto">
                    @livewire('create-grupo')
                </div>
            </div>
        </div>

        @if ($grupos->count())
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <table class="min-w-full divide-y divide-[#a4b0af]/20">
                    <thead class="bg-[#eff2f2]">
                        <tr>
                            <th scope="col" class="cursor-pointer px-6 py-4 text-left text-xs font-medium text-[#5d5c64] uppercase tracking-wider hover:text-[#28b0a3] transition-colors duration-300" wire:click="order('codgrupo')">
                                <div class="flex items-center gap-2">
                                    Código de Grupo
                                    <i class="fas fa-sort"></i>
                                </div>
                            </th>
                            <th scope="col" class="cursor-pointer px-6 py-4 text-left text-xs font-medium text-[#5d5c64] uppercase tracking-wider hover:text-[#28b0a3] transition-colors duration-300" wire:click="order('descripcion')">
                                <div class="flex items-center gap-2">
                                    Descripción
                                    <i class="fas fa-sort"></i>
                                </div>
                            </th>
                            <th scope="col" class="cursor-pointer px-6 py-4 text-left text-xs font-medium text-[#5d5c64] uppercase tracking-wider hover:text-[#28b0a3] transition-colors duration-300" wire:click="order('fechafundacion')">
                                <div class="flex items-center gap-2">
                                    Fecha de Fundación
                                    <i class="fas fa-sort"></i>
                                </div>
                            </th>
                            <th scope="col" class="cursor-pointer px-6 py-4 text-left text-xs font-medium text-[#5d5c64] uppercase tracking-wider hover:text-[#28b0a3] transition-colors duration-300" wire:click="order('encargado')">
                                <div class="flex items-center gap-2">
                                    Encargado
                                    <i class="fas fa-sort"></i>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-[#5d5c64] uppercase tracking-wider">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#a4b0af]/20">
                        @foreach ($grupos as $grupo)
                            <tr class="hover:bg-[#eff2f2]/50 transition-colors duration-200">
                                <td class="px-6 py-4">
                                    <div class="text-sm text-[#1e1e1f] font-medium">
                                        {{$grupo->codgrupo}}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-[#5d5c64]">
                                        {{$grupo->descripcion}}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-[#777779]">
                                        {{ \Carbon\Carbon::parse($grupo->fechafundacion)->format('d/m/Y') }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-[#5d5c64]">
                                        {{$grupo->encargado}}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div>
                                            @livewire('edit-grupo', ['grupo' => $grupo], key($grupo->id))
                                        </div>
                                        <div>
                                            @if ($showDeleted)
                                                <button class="p-2 bg-[#28b0a3] text-white rounded-lg hover:bg-[#6acbc3] transition-all duration-300 shadow-sm hover:shadow-md transform hover:scale-[1.02]"
                                                    wire:click="restore({{ $grupo->id }})">
                                                    <i class="fas fa-undo"></i>
                                                </button>
                                            @else
                                                <button class="p-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-all duration-300 shadow-sm hover:shadow-md transform hover:scale-[1.02]"
                                                    wire:click="$emit('deleteGrupo', {{$grupo->id}})">
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
        @else
            <div class="bg-white rounded-xl shadow-md p-8 text-center text-[#777779]">
                No existen grupos registrados
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
</style>