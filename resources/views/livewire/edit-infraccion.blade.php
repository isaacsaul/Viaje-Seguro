<div>
    <a wire:click="$set('open', true)">
        <i style="background-color: green; padding: 0.5rem; border-radius: 3px;" class="fas fa-edit text-white"></i>
    </a>

    <x-modal wire:model="open">
        <div class="rounded shadow-lg">
            <!-- Ranura (slot) para el título -->
            <div class="bg-gray-200 py-4 px-6 rounded-t flex items-center justify-center">
                <slot name="title">Editar infracción</slot>
                {{ $infraccion->id }} <!-- Mostrar el ID de la infracción -->
            </div>

            <!-- Ranura (slot) para el contenido -->
            <div class="p-6">
                <slot name="content">
                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Tipo de infracción:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="infraccion.tipoinfraccion">
                            @error('infraccion.tipoinfraccion')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Fecha de infracción:</label>
                        </div>
                        <div class="w-full" >
                            <input type="date" class="w-full rounded" wire:model.defer="infraccion.fechainfraccion">
                            @error('infraccion.fechainfraccion')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Estado:</label>
                        </div>
                        <div class="w-full" >
                            <select wire:model.defer="infraccion.estado" class="w-full rounded">
                                <option value="">Selecciona un estado</option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                                <option value="Pendiente">Pendiente</option>
                            </select>
                            @error('infraccion.estado')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">ID de Sanción:</label>
                        </div>
                        <div class="w-full">
                            <select wire:model.defer="infraccion.id_sancion" class="w-full rounded">
                                <option value="">Selecciona una sanción</option>
                                @foreach ($sanciones as $sancion)
                                    <option value="{{ $sancion->id }}">{{ $sancion->id }} - {{ $sancion->tiposancion }}</option>
                                @endforeach
                            </select>
                            @error('infraccion.id_sancion')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </slot>
            </div>

            <!-- Ranura (slot) para el footer -->
            <div class="bg-gray-200 py-4 px-6 rounded-b text-right">
                <slot name="footer">
                    <button style="background-color: blueviolet" class="py-2 px-4 rounded" wire:click="$set('open', false)">Cancelar</button>
                    <button class="py-2 px-4 rounded" wire:click="save">Actualizar</button>
                </slot>
            </div>
        </div>
    </x-modal>
</div>
