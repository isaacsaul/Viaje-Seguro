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

                <button class="w-full sm:w-auto px-6 py-3 bg-[#28b0a3] hover:bg-[#6acbc3] text-white rounded-lg transition-colors duration-300 flex items-center justify-center gap-2 font-medium"
                    wire:click="toggleDeleted">
                    <i class="fas fa-exchange-alt"></i>
                    {{ $showDeleted ? 'Mostrar Activas' : 'Mostrar Eliminados' }}
                </button>

                <div class="w-full sm:w-auto">
                    @livewire('create-noticia')
                </div>
            </div>
        </div>

        <!-- Tabla de noticias -->
        @if ($noticias->count())
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <table class="min-w-full divide-y divide-[#a4b0af]/20">
                    <thead class="bg-[#eff2f2]">
                        <tr>
                            <th scope="col" class="cursor-pointer px-6 py-4 text-left text-xs font-medium text-[#5d5c64] uppercase tracking-wider hover:text-[#28b0a3] transition-colors duration-300" wire:click="order('titulo')">
                                <div class="flex items-center gap-2">
                                    Título
                                    <i class="fas fa-sort"></i>
                                </div>
                            </th>
                            <th scope="col" class="cursor-pointer px-6 py-4 text-left text-xs font-medium text-[#5d5c64] uppercase tracking-wider hover:text-[#28b0a3] transition-colors duration-300" wire:click="order('contenido')">
                                <div class="flex items-center gap-2">
                                    Contenido
                                    <i class="fas fa-sort"></i>
                                </div>
                            </th>
                            <th scope="col" class="cursor-pointer px-6 py-4 text-left text-xs font-medium text-[#5d5c64] uppercase tracking-wider hover:text-[#28b0a3] transition-colors duration-300" wire:click="order('created_at')">
                                <div class="flex items-center gap-2">
                                    Fecha
                                    <i class="fas fa-sort"></i>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-[#5d5c64] uppercase tracking-wider">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#a4b0af]/20">
                        @foreach ($noticias as $noticia)
                            <tr class="hover:bg-[#eff2f2]/50 transition-colors duration-200">
                                <td class="px-6 py-4">
                                    <div class="text-sm text-[#1e1e1f]">
                                        {{$noticia->titulo}}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-[#5d5c64]">
                                        {{$noticia->contenido}}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-[#777779]">
                                        {{ $noticia->created_at->format('d/m/Y') }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div>
                                            @livewire('edit-noticia', ['noticia' => $noticia], key($noticia->id))
                                        </div>
                                        <div>
                                            @if ($showDeleted)
                                                <button class="p-2 bg-[#28b0a3] text-white rounded-lg hover:bg-[#6acbc3] transition-colors duration-300"
                                                    wire:click="restore({{ $noticia->id }})">
                                                    <i class="fas fa-undo"></i>
                                                </button>
                                            @else
                                                <button class="p-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors duration-300"
                                                    wire:click="$emit('deleteNoticia', {{$noticia->id}})">
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
                No existen noticias registradas
            </div>
        @endif

        <!-- Galería de imágenes -->
        @if($noticias->count())
            <div class="mt-8 bg-white rounded-xl shadow-md p-6 overflow-hidden">
                <h3 class="text-lg font-medium text-[#1e1e1f] mb-4">Galería de Imágenes</h3>
                <div class="flex gap-4 overflow-x-auto pb-4 scrollbar-thin scrollbar-thumb-[#28b0a3] scrollbar-track-[#eff2f2]">
                    @foreach ($noticias as $noticia)
                        @if ($noticia->imagen)
                            <div class="flex-none">
                                <img src="{{ asset('storage/' . $noticia->imagen) }}"
                                    alt="{{ $noticia->titulo }}"
                                    class="w-[350px] h-[200px] object-cover rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300"
                                    style="object-fit: cover;">
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>

<style>
    /* Estilos para la barra de desplazamiento */
    .scrollbar-thin::-webkit-scrollbar {
        height: 6px;
    }

    .scrollbar-thin::-webkit-scrollbar-track {
        background: #eff2f2;
        border-radius: 3px;
    }

    .scrollbar-thin::-webkit-scrollbar-thumb {
        background: #28b0a3;
        border-radius: 3px;
    }

    .scrollbar-thin::-webkit-scrollbar-thumb:hover {
        background: #6acbc3;
    }
</style>