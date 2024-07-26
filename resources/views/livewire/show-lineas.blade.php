<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="px-6 py-4 flex items-center">
            <input type="text" class="flex-1" style="margin-right: 1rem; border-radius: 5px;" placeholder="Escribe para buscar" wire:model="search">
            @livewire('create-linea')
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 overflow-x-auto">
            <!-- Contenedor para la tabla con desplazamiento horizontal -->
            <div class="py-4 align-middle inline-block min-w-full">
                <div class="overflow-hidden border-b border-gray-200 sm:rounded-lg">

                        <!-- El resto de tu tabla y contenido -->






                    @if ($lineas->count())
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="w-24 cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('id')">
                                        ID
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th scope="col" class="cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('codigo')">
                                        Código
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th scope="col" class="cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('tipovehiculo')">
                                        Tipo de Vehículo
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th scope="col" class="cursor-pointer px-20 mx-20 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('descripcion')">
                                        Descripción
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th scope="col" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('grupo_id')">
                                        ID de Grupo
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th scope="col" class="cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('grupo_id')">
                                        codigo de Grupo
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th scope="col" class="cursor-pointer px-20 mx-20 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('grupo_id')">
                                        Descripcion de Grupo
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th scope="col" class="cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('grupo_id')">
                                        Fecha de fundacion de Grupo
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th scope="col" class="cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('grupo_id')">
                                        Nombre del encargado de Grupo
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($lineas as $linea)
                                    <tr>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{$linea->id}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{$linea->codigo}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{$linea->tipovehiculo}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{$linea->descripcion}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{$linea->grupo_id}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{ $linea->grupo->codgrupo }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{ $linea->grupo->descripcion }}
                                            </div>
                                        </td>
                                        <td class="px-4 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{ $linea->grupo->fechafundacion }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{ $linea->grupo->encargado }}
                                            </div>
                                        </td>

                                        <td class="px-12 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex">
                                                <div class="mr-4">
                                                    @livewire('edit-linea', ['linea' => $linea], key($linea->id))
                                                </div>
                                                <div>
                                                    <a class="btn btn-red text-white" style="background-color: red; padding:10px; border-radius: 3px;" wire:click="$emit('deleteLinea', {{$linea->id}})">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="px-6 py-4">
                            No existen líneas registradas
                        </div>
                    @endif


                </div>
            </div>
        </div>



    </div>
</div>
