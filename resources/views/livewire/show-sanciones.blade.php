<div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
        <div class="px-6 py-4 flex items-center">
            <input type="text" class="flex-1" style="margin-right: 1rem; border-radius: 5px;" placeholder="Escribe para buscar" wire:model="search">
            @livewire('create-sancion')
        </div>

        @if ($sancions->count())
            <table class="min-w-full divide-y divide-gray-200 ">
                <thead class="bg-gray-50 ">
                    <tr>
                        <th scope="col" class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('id')">
                            ID
                            <i class="fas fa-sort"></i>
                        </th>
                        <th scope="col" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('tiposancion')">
                            Tipo de Sanción
                            <i class="fas fa-sort"></i>
                        </th>
                        <th scope="col" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('descripcion')">
                            Descripción
                            <i class="fas fa-sort"></i>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($sancions as $sancion)
                        <tr>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{$sancion->id}}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{$sancion->tiposancion}}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{$sancion->descripcion}}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium grid grid-cols-2  cursor-pointer">

                                <div>
                                     @livewire('edit-sancion',['sancion' =>$sancion], key($sancion->id)) 
                                </div>

                                <div>
                                    <a class="btn btn-red  text-white" style="background-color: red; padding:10px; border-radius: 3px; " wire:click="$emit('deleteSancion',{{$sancion->id}})">
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
                No existen sanciones registradas
            </div>
        @endif
    </div>

</div>
