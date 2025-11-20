<div>
    
    <button class="py-2 px-4 rounded"
            style="background-color: rgb(21, 201, 214); color: white; font-weight: 400; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; box-shadow: 2px 2px 5px rgba(0,0,0,0.2); transition: background-color 0.3s ease;"
            wire:click="$set('open', true)"
            onmouseover="this.style.backgroundColor='rgb(15, 158, 168)'"
            onmouseout="this.style.backgroundColor='rgb(21, 201, 214)'">
            Crear nuevo pago
    </button>

    <x-modal wire:model="open">
        <div class="rounded shadow-lg">
            <!-- Título del modal -->
            <div class="bg-gray-200 py-4 px-6 rounded-t flex items-center justify-center">
                Crear un nuevo pago
            </div>

            <!-- Contenido del modal -->
            <div class="p-6">
                <div>
                    <label style="margin-right: 0.5rem;">No Serial:</label>
                    <input type="text" class="w-full rounded" wire:model.defer="No_serial">
                    @error('No_serial')
                       <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label style="margin-right: 0.5rem;">Fecha:</label>
                    <input type="date" class="w-full rounded" wire:model.defer="fecha">
                    @error('fecha')
                       <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label style="margin-right: 0.5rem;">Carnet:</label>
                    <select class="w-full rounded" wire:model.defer="carnet">
                        <option value="">Seleccione un carnet</option>
                        @foreach ($carnets as $carnet)
                            <option value="{{ $carnet }}">{{ $carnet }}</option>
                        @endforeach
                    </select>
                    @error('carnet')
                       <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Footer del modal -->
            <div class="bg-gray-200 py-4 px-6 rounded-b text-right">
                <slot name="footer">
                    <!-- Botón de cancelar con fondo rojo y texto blanco -->
                    <button class="py-2 px-4 rounded text-white" style="background-color: red;" wire:click="$set('open', false)">Cancelar</button>
                    <!-- Botón de crear con fondo verde y texto blanco -->
                    <button class="py-2 px-4 rounded text-white" style="background-color: green;" wire:click="save">Crear</button>
                </slot>
            </div>

        </div>
    </x-modal>
</div>
