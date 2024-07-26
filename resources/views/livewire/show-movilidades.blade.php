<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="px-6 py-4 flex items-center">
            <input type="text" class="flex-1" style="margin-right: 1rem; border-radius: 5px;" placeholder="Escribe para buscar" wire:model="search">
            <!-- Aquí se incluiría el componente para crear una nueva movilidad -->
            @livewire('create-movilidad')
        </div>




        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 overflow-x-auto">
            <!-- Contenedor para la tabla con desplazamiento horizontal -->
            <div class="py-4 align-middle inline-block min-w-full">
                <div class="overflow-hidden border-b border-gray-200 sm:rounded-lg">


                    @if ($movilidades->count())
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="w-40 cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('id')">
                                        ID
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th scope="col" class="cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('placa')">
                                        Placa
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th scope="col" class="cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('color')">
                                        Color
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th scope="col" class="cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('marca')">
                                        Marca
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th scope="col" class="cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('modelo')">
                                        Modelo
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th scope="col" class="cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('capacidad')">
                                        Capacidad
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th scope="col" class="bg-gray-200  cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('linea_id')">
                                        LINEA ID
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th scope="col" class="w-30 bg-gray-200  cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('codgrupo')">
                                        Código de la linea
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th scope="col" class=" bg-gray-200 cursor-pointer px-8 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('codgrupo')">
                                        Tipo de vehiculo de la linea
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th scope="col" class="cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('grupo_id')">
                                        Grupo ID
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th scope="col" class="cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('grupo_id')">
                                        Codigo de Grupo
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th scope="col" class=" w-30 cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('grupo_id')">
                                        Descripcion de Grupo
                                        <i class="fas fa-sort"></i>
                                    </th>


                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($movilidades as $movilidad)
                                    <tr>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900 w-30 ">
                                                {{$movilidad->id}}
                                            </div>
                                        </td>
                                        <td class="px-4 py-4">
                                            <div class="text-sm text-gray-900 w-20">
                                                {{$movilidad->placa}}
                                            </div>
                                        </td>
                                        <td class="px-4 py-4">
                                            <div class="text-sm text-gray-900 w-20">
                                                {{$movilidad->color}}
                                            </div>
                                        </td>
                                        <td class="px-8 py-4">
                                            <div class="text-sm text-gray-900 w-20">
                                                {{$movilidad->marca}}
                                            </div>
                                        </td>
                                        <td class="px-8 py-4">
                                            <div class="text-sm text-gray-900 w-30">
                                                {{$movilidad->modelo}}
                                            </div>
                                        </td>
                                        <td class="px-8 py-4">
                                            <div class="text-sm text-gray-900 w-20">
                                                {{$movilidad->capacidad}}
                                            </div>
                                        </td>
                                        <td class="px-8 py-4 bg-gray-100">
                                            <div class="text-sm text-gray-900 w-10">
                                                {{ $movilidad->linea->id }}
                                            </div>
                                        </td>
                                        <td class="px-8 py-4  bg-gray-100">
                                            <div class="text-sm text-gray-900 w-30">
                                                {{ $movilidad->linea->codigo }}
                                            </div>
                                        </td>

                                        <td class="px-8 py-4  bg-gray-100 ">
                                            <div class="text-sm text-gray-900 w-40  pl-14">
                                                {{ $movilidad->linea->tipovehiculo }}
                                            </div>
                                        </td>

                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900 w-20">
                                                    {{ $movilidad->linea->grupo_id }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900 w-40  pl-14">
                                                    {{ $movilidad->linea->grupo->codgrupo }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900 w-40">
                                                    {{ $movilidad->linea->grupo->descripcion }}
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium grid grid-cols-2 cursor-pointer">
                                            <!-- Aquí se incluiría el componente para editar la movilidad -->
                                            <!-- Y el botón para eliminar la movilidad -->
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium grid grid-cols-2 cursor-pointer">
                                            <!-- Componente para editar la movilidad -->
                                            @livewire('edit-movilidad', ['movilidad' => $movilidad], key($movilidad->id))
                                            <!-- Botón para eliminar la movilidad -->
                                            <div>
                                                <a class="btn btn-red text-white" style="background-color: red; padding:10px; border-radius: 3px;" wire:click="$emit('deleteMovilidad', {{ $movilidad->id }})">
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
                            No existen movilidades registradas
                        </div>
                    @endif


                </div>
           </div>
        </div>
    </div>
</div>
