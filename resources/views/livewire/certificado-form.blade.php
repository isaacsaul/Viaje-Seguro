<div class="flex flex-col items-center">
    <div class="mb-4">
        <input type="text" wire:model="ci" placeholder="Ingrese el número de carnet" class="p-2 border border-gray-300 rounded " />
        <button wire:click="buscarChofer" class="p-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            Buscar Chofer
        </button>
    </div>

    @if ($chofer)
        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-md w-full max-w-md">
            <h3 class="text-xl font-semibold mb-4 text-center">Certificado del Chofer</h3>
            <table class="w-full mb-4">
                <tbody>
                    <tr>
                        <td class="font-medium pr-4 text-right">CI:</td>
                        <td>{{ $chofer->ci }}</td>
                    </tr>
                    <tr>
                        <td class="font-medium pr-4 text-right">Nombres:</td>
                        <td>{{ $chofer->nombres }}</td>
                    </tr>
                    <tr>
                        <td class="font-medium pr-4 text-right">Apellidos:</td>
                        <td>{{ $chofer->apellidos }}</td>
                    </tr>
                    <tr>
                        <td class="font-medium pr-4 text-right">Movilidad:</td>
                        <td>{{ $chofer->movilidad->placa ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="font-medium pr-4 text-right">Tipo de Socio:</td>
                        <td>{{ $chofer->tiposocio->nombresocio ?? 'N/A' }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="mb-4">
                <label for="certificadoContent" class="block text-sm font-medium text-gray-700">Contenido del Certificado:</label>
                <textarea id="certificadoContent" wire:model="certificadoContent" rows="10" class="p-2 border border-gray-300 rounded w-full"></textarea>
            </div>
        </div>

        <div class="mt-4">
            <button wire:click="generarPdf" class="p-2 bg-green-500 text-white rounded hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                Generar PDF
            </button>
        </div>
    @endif
</div>
