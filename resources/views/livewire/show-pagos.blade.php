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
                    @livewire('create-pago')
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto overflow-x-auto">
            <div class="py-4 align-middle inline-block min-w-full">
                <div class="overflow-hidden border border-[#a4b0af]/20 rounded-xl shadow-md">
                    @if ($pagos->count())
                        <table class="min-w-full divide-y divide-[#a4b0af]/20">
                            <thead class="bg-[#eff2f2]">
                                <tr>
                                    <th scope="col" class="cursor-pointer px-6 py-4 text-left">
                                        <div class="flex items-center gap-2 group">
                                            <span class="text-xs font-medium text-[#5d5c64] uppercase tracking-wider group-hover:text-[#28b0a3] transition-colors duration-300" wire:click="order('No_serial')">No Serial</span>
                                            <i class="fas fa-sort text-[#777779] group-hover:text-[#28b0a3]"></i>
                                        </div>
                                    </th>
                                    <th scope="col" class="cursor-pointer px-6 py-4 text-left">
                                        <div class="flex items-center gap-2 group">
                                            <span class="text-xs font-medium text-[#5d5c64] uppercase tracking-wider group-hover:text-[#28b0a3] transition-colors duration-300" wire:click="order('fecha')">Fecha</span>
                                            <i class="fas fa-sort text-[#777779] group-hover:text-[#28b0a3]"></i>
                                        </div>
                                    </th>
                                    <th scope="col" class="cursor-pointer px-6 py-4 text-left">
                                        <div class="flex items-center gap-2 group">
                                            <span class="text-xs font-medium text-[#5d5c64] uppercase tracking-wider group-hover:text-[#28b0a3] transition-colors duration-300" wire:click="order('carnet')">Carnet</span>
                                            <i class="fas fa-sort text-[#777779] group-hover:text-[#28b0a3]"></i>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-right">
                                        <span class="text-xs font-medium text-[#5d5c64] uppercase tracking-wider">Acciones</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-[#a4b0af]/20">
                                @foreach ($pagos as $pago)
                                    <tr class="hover:bg-[#eff2f2]/50 transition-colors duration-200">
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-[#1e1e1f] font-medium">{{$pago->No_serial}}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-[#777779]">
                                                {{ \Carbon\Carbon::parse($pago->fecha)->format('d/m/Y') }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-[#5d5c64]">{{$pago->ci}}</div>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <div class="flex items-center justify-end gap-3">
                                                <div>
                                                    @livewire('edit-pago', ['pago' => $pago], key($pago->id))
                                                </div>
                                                <div>
                                                    @if ($showDeleted)
                                                        <button class="p-2 bg-[#28b0a3] text-white rounded-lg hover:bg-[#6acbc3] transition-all duration-300 shadow-sm hover:shadow-md transform hover:scale-[1.02]"
                                                            wire:click="restore({{ $pago->id }})">
                                                            <i class="fas fa-undo"></i>
                                                        </button>
                                                    @else
                                                        <button class="p-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-all duration-300 shadow-sm hover:shadow-md transform hover:scale-[1.02]"
                                                            wire:click="$emit('deletePago', {{$pago->id}})">
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
                    @else
                        <div class="bg-white rounded-xl shadow-md p-8 text-center">
                            <div class="flex flex-col items-center justify-center gap-3">
                                <svg class="w-12 h-12 text-[#777779]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                                <p class="text-lg font-medium text-[#5d5c64]">No existen pagos registrados</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
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