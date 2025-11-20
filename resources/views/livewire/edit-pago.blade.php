<div>
    <a wire:click="$set('open', true)">
        <a class="btn btn-green text-white" style="background-color: green; padding:10px; border-radius: 3px;" wire:click="$set('open', true)">
            <i class="fas fa-edit"></i>
        </a>
    </a>

    <x-modal wire:model="open">
        <div class="rounded shadow-lg">
            <!-- Título del modal -->
            <div class="bg-gray-200 py-4 px-6 rounded-t flex items-center justify-center">
                <slot name="title">Editar Pago</slot>
                {{ $pago->No_serial }}
            </div>

            <!-- Contenido del modal -->
            <div class="p-6">
                <slot name="content">
                    <div style="margin-bottom: 1rem;">
                        <div style="margin-bottom: 0.5rem; text-align: left;">
                            <label>No Serial:</label>
                        </div>
                        <div style="width: 100%;">
                            <input type="text" style="width: 100%; border-radius: 0.375rem; padding: 0.5rem;" wire:model.defer="pago.No_serial">
                            @error('pago.No_serial')
                                <span style="color: red; font-size: 0.875rem; display: block; margin-top: 0.25rem;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <div style="margin-bottom: 0.5rem; text-align: left;">
                            <label>Fecha:</label>
                        </div>
                        <div style="width: 100%;">
                            <input type="date" style="width: 100%; border-radius: 0.375rem; padding: 0.5rem;" wire:model.defer="pago.fecha">
                            @error('pago.fecha')
                                <span style="color: red; font-size: 0.875rem; display: block; margin-top: 0.25rem;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <div style="margin-bottom: 0.5rem; text-align: left;">
                            <label>Carnet:</label>
                        </div>
                        <div class="w-full">
                            <select class="w-full rounded" wire:model.defer="pago.ci">
                                <option value="">Seleccione un carnet</option>
                                @foreach($choferes as $chofer)
                                    <option value="{{ $chofer->ci }}">{{ $chofer->ci }}</option>
                                @endforeach
                            </select>
                            @error('pago.carnet')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </slot>
            </div>

            <!-- Footer del modal -->
            <div class="bg-gray-200 py-4 px-6 rounded-b text-right">
                <slot name="footer">
                    <button style="background-color: red; color: white;" class="py-2 px-4 rounded" wire:click="$set('open', false)">Cancelar</button>
                    <button style="background-color: green; color: white;" class="py-2 px-4 rounded" wire:click="save">Actualizar</button>
                </slot>
            </div>
        </div>
    </x-modal>
</div>