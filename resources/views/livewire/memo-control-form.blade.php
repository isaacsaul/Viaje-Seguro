<div class="flex flex-col items-center">
    <div class="mb-4">
        <input type="text" wire:model.defer="carnet" placeholder="Ingrese el número de carnet" class="p-2 border border-gray-300 rounded" />
        <button wire:click="buscarChofer" class="p-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            Memo Control
        </button>
    </div>

    @if($chofer)
    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-md w-full max-w-md">
        <h3 class="text-xl font-semibold mb-4 text-center">Memo Control</h3>
        <div class="text-left mb-4">
            <p><strong>Nombre:</strong> {{ $chofer->nombres }} {{ $chofer->apellidos }}</p>
            <p><strong>Carnet:</strong> {{ $chofer->carnet }}</p>
            <p><strong>Fecha de Ingreso:</strong> {{ $chofer->fecha_ingreso }}</p>
        </div>
        <div class="mb-4">
            <textarea wire:model.defer="parrafo" placeholder="Ingrese el párrafo de citación" class="p-2 border border-gray-300 rounded w-full" rows="5">{{ $parrafo }}</textarea>
        </div>
        <div class="mb-4">
            <input type="text" wire:model.defer="numeroSerie" placeholder="Número de serie" class="p-2 border border-gray-300 rounded w-full" />
        </div>
        <div class="mt-4">
            <label class="block mb-2 font-semibold">Seleccionar Firmas:</label>
            @foreach ($firmas as $firma)
                <div class="flex items-center mb-2">
                    <input type="checkbox" wire:model="selectedFirmas" value="{{ $firma['nombre'] }}" class="mr-2" />
                    <label>{{ $firma['nombre'] }} - {{ $firma['cargo'] }}</label>
                </div>
            @endforeach
        </div>
        <button wire:click="generarPdf" class="p-2 bg-green-500 text-white rounded hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 mt-4">
            Generar PDF
        </button>
    </div>
    @endif
</div>
