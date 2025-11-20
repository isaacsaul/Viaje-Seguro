<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="px-6 py-4">
            <div class="flex items-center bg-white rounded-lg shadow-sm">
                <div class="relative flex-1">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                        </svg>
                    </div>
                    <input
                        type="text"
                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Buscar por CI del chofer..."
                        wire:model.debounce.300ms="search"
                        pattern="[0-9]*"
                        inputmode="numeric">
                </div>
            </div>
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
                                        N°
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
                                        Tipo de Sanción
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th scope="col" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('chofer_id')">
                                        Carnet de Identidad del Chofer
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th scope="col" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('chofer_id')">
                                        Correo del Chofer
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
                                                {{$infraccion->sancion->tiposancion}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{$infraccion->chofer->ci}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{$infraccion->chofer->correo}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{$infraccion->chofer->nombres}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <button class="font-bold py-2 px-4 rounded" style="background-color: green"
                                                wire:click="enviarCorreo({{ $infraccion->id }})">
                                                Correo
                                            </button>
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

    <!-- Modal para mostrar mensaje de confirmación -->
    <x-modal wire:model="openConfirmationModal">
        <div class="rounded shadow-lg">
            <div style="background-color: rgb(63, 206, 206)" class="py-4 px-6 rounded-t flex items-center justify-center">
                <h3>Correo enviado exitosamente</h3>
            </div>

            <div class="rounded shadow-lg p-6 flex justify-center items-center flex-col">
                <img src="https://cdn-icons-gif.flaticon.com/6416/6416397.gif" loading="lazy" alt="Envío" title="Envío" width="150" height="150" style="margin-right: 10px;">
                <p>El correo electrónico se envió correctamente.</p>
            </div>

            <div style="background-color: rgb(63, 206, 206)" class="py-4 px-6 rounded-b text-right">
                <button class="py-2 px-4 rounded" wire:click="$set('openConfirmationModal', false)">Cerrar</button>
            </div>
        </div>
    </x-modal>
</div>