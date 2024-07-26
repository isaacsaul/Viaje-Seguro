<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="px-6 py-4 flex items-center">
            <button class="font-bold py-2 px-4 rounded" style="background-color: rgb(21, 201, 214)" wire:click="$set('open', true)">
                Crear nueva infracción
            </button>
        </div>

        <x-modal wire:model="open">
            <div class="rounded shadow-lg">
                <!-- Ranura (slot) para el título -->
                <div class="bg-gray-200 py-4 px-6 rounded-t flex items-center justify-center">
                    <slot name="title">Crear una nueva infracción</slot>
                </div>

                <!-- Ranura (slot) para el contenido -->
                <div class="p-6">
                    <slot name="content">
                        <div>
                            <div>
                                <label style="margin-right: 0.5rem;">Tipo de infracción:</label>
                            </div>
                            <div class="w-full">
                                <input type="text" class="w-full rounded" wire:model.defer="tipoinfraccion">
                                @error('tipoinfraccion')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <div>
                                <label style="margin-right: 0.5rem;">Fecha de infracción:</label>
                            </div>
                            <div class="w-full">
                                <input type="date" class="w-full rounded" wire:model.defer="fechainfraccion">
                                @error('fechainfraccion')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <div>
                                <label style="margin-right: 0.5rem;">Estado:</label>
                            </div>
                            <div class="w-full">
                                <select wire:model.defer="estado" class="w-full rounded">
                                    <option value="">Selecciona el estado</option>
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                    <option value="En proceso">En proceso</option>
                                </select>
                                @error('estado')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <div>
                                <label style="margin-right: 0.5rem;">ID de Sanción:</label>
                            </div>
                            <div class="w-full">
                                <select wire:model.defer="id_sancion" class="w-full rounded">
                                    <option value="">Selecciona una sanción</option>
                                    @foreach ($sanciones as $sancion)
                                      <option value="{{ $sancion->id }}">{{ $sancion->id }} - {{ $sancion->tiposancion }}</option>
                                    @endforeach
                                </select>
                                @error('id_sancion')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <div>
                                <label style="margin-right: 0.5rem;">ID del Chofer:</label>
                            </div>
                            <div class="w-full">
                                <select wire:model.defer="chofer_id" class="w-full rounded">
                                    <option value="">Selecciona el ID del chofer</option>
                                    @foreach ($choferes as $chofer)
                                      <option value="{{ $chofer->id }}">{{ $chofer->id }} - {{ $chofer->nombres }}</option>
                                    @endforeach
                                </select>
                                @error('chofer_id')
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
                        <button class="py-2 px-4 rounded"  style="background-color: rgb(67, 216, 204)" wire:click="save">Crear</button>
                    </slot>
                </div>
            </div>
        </x-modal>
    </div>
</div>
