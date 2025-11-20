<div class="container mx-auto px-4 py-6">
    <!-- Filtros con diseño mejorado -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Año Selector Mejorado -->
            <div>
                <label for="yearRange" class="block text-gray-700 text-lg font-semibold mb-2">
                    Selecciona el Año
                </label>
                <select id="yearRange"
                        wire:model="yearRange"
                        class="w-full md:w-8/12 p-3 border border-gray-300 rounded-lg shadow-sm
                               transition duration-150 ease-in-out
                               focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50
                               hover:border-gray-400">
                    @foreach ($yearRanges as $range)
                        <option value="{{ $range }}">{{ $range }}</option>
                    @endforeach
                </select>
            </div>

            <!-- CI Selector Mejorado -->
            <div>
                <label for="ci" class="block text-gray-700 text-lg font-semibold mb-2">
                    Buscar por CI
                </label>
                <div class="flex flex-col sm:flex-row gap-3">
                    <input type="text"
                           id="ci"
                           wire:model="ci"
                           class="flex-1 p-3 border border-gray-300 rounded-lg shadow-sm
                                  transition duration-150 ease-in-out
                                  focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50
                                  hover:border-gray-400"
                           placeholder="Ingrese el número de CI" />
                    <button wire:click="buscar"
                            class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow-sm
                                   transition duration-150 ease-in-out
                                   hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50
                                   active:bg-blue-800">
                        <span class="flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            Buscar
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla Responsive Mejorada -->
    @foreach ($choferes as $chofer)
        <div class="mb-6 bg-white rounded-lg shadow-md overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="sticky left-0 z-10 bg-gray-50 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombres
                            </th>
                            <th scope="col" class="sticky left-32 z-10 bg-gray-50 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Apellidos
                            </th>
                            @for ($week = 1; $week <= $totalWeeks; $week++)
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full">S{{ $week }}</span>
                                </th>
                            @endfor
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full">No Pagos</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50 transition-colors duration-150">
                            <td class="sticky left-0 z-10 bg-white px-6 py-4 whitespace-nowrap font-medium text-gray-900">
                                {{ $chofer->nombres }}
                            </td>
                            <td class="sticky left-32 z-10 bg-white px-6 py-4 whitespace-nowrap text-gray-900">
                                {{ $chofer->apellidos }}
                            </td>
                            @for ($week = 1; $week <= $totalWeeks; $week++)
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @if (isset($paymentStatus[$chofer->id][$week]) && $paymentStatus[$chofer->id][$week] !== '✘')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                            {{ $paymentStatus[$chofer->id][$week] }}
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                            ✘
                                        </span>
                                    @endif
                                </td>
                            @endfor
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium {{ $missedPayments[$chofer->id] > 0 ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                    {{ $missedPayments[$chofer->id] ?? 0 }}
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach

    <!-- Paginación Mejorada -->
    <div class="mt-6">
        {{ $choferes->links() }}
    </div>
</div>