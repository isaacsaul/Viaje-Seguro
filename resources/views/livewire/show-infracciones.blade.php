<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="px-6 py-4 flex items-center">
            <input type="text" class="flex-1" style="margin-right: 1rem; border-radius: 5px;" placeholder="Escribe para buscar" wire:model="search">
            <!-- Aquí se incluiría el componente para crear una nueva infracción -->
            @livewire('create-infraccion')
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 overflow-x-auto">
            <!-- Contenedor para la tabla con desplazamiento horizontal -->
            <div class="py-4 align-middle inline-block min-w-full">
                <div class="overflow-hidden border-b border-gray-200 sm:rounded-lg">


                    @if ($infracciones->count())
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('id')">
                                        ID
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th scope="col" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('tipoinfraccion')">
                                        Tipo de Infracción
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th scope="col" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('fechainfraccion')">
                                        Fecha de Infracción
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th scope="col" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('estado')">
                                        Estado
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th scope="col" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('id_sancion')">
                                        ID de Sanción
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th scope="col" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('id_sancion')">
                                        Tipo de Sanción
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th scope="col" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('chofer_id')">
                                        ID del Chofer
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th scope="col" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('chofer_id')">
                                        Carnet de Identidad del Chofer
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th scope="col" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('chofer_id')">
                                        Nombre del Chofer
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($infracciones as $infraccion)
                                    <tr>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{$infraccion->id}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{$infraccion->tipoinfraccion}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{$infraccion->fechainfraccion}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{$infraccion->estado}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{$infraccion->id_sancion}}
                                            </div>
                                        </td>

                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{$infraccion->sancion->tiposancion}}
                                            </div>
                                        </td>

                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{$infraccion->chofer_id}}
                                            </div>
                                        </td>

                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{$infraccion->chofer->ci}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{$infraccion->chofer->nombres}}
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium grid grid-cols-2 cursor-pointer">
                                            <!-- Componente para editar la infracción -->
                                            @livewire('edit-infraccion', ['infraccion' => $infraccion], key($infraccion->id))
                                            <!-- Botón para eliminar la infracción -->
                                            <div>
                                                <a class="btn btn-red text-white" style="background-color: red; padding:10px; border-radius: 3px;" wire:click="$emit('deleteInfraccion', {{ $infraccion->id }})">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="px-6 py-4">
                            No existen infracciones registradas
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
