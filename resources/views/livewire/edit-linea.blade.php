<div>
    <a wire:click="$set('open', true)" class="btn btn-green text-white" style="background-color: green; padding:10px; border-radius: 3px;">
        <i class="fas fa-edit"></i>
    </a>

    <x-modal wire:model="open">
        <div class="rounded shadow-lg">
            <!-- Ranura (slot) para el título -->
            <div class="bg-gray-200 py-4 px-6 rounded-t flex items-center justify-center">
                <slot name="title">Editar línea</slot>
                {{$linea->codigo}} <!-- Mostrar el código de la línea -->
            </div>

            <!-- Ranura (slot) para el contenido -->
            <div class="p-6">
                <slot name="content">
                    <div>
                        <div style="margin-bottom: 0.5rem;">
                            <label style="margin-right: 0.5rem;">Código:</label>
                        </div>
                        <div style="width: 100%;">
                            <input type="text" style="width: 100%; border-radius: 0.375rem; padding: 0.5rem;" wire:model.defer="linea.codigo">
                            @error('linea.codigo')
                                <span style="color: red; font-size: 0.875rem; display: block; margin-top: 0.25rem;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div>
                        <div style="margin-bottom: 0.5rem;">
                            <label style="margin-right: 0.5rem;">Tipo de vehículo:</label>
                        </div>
                        <div style="width: 100%;">
                            <select style="width: 100%; border-radius: 0.375rem; padding: 0.5rem;" wire:model.defer="linea.tipovehiculo">
                                <option value="">Selecciona un tipo</option>
                                <option value="Carry´s" {{ $linea->tipovehiculo === 'Carry´s' ? 'selected' : '' }}>Carry´s</option>
                                <option value="Micros" {{ $linea->tipovehiculo === 'Micros' ? 'selected' : '' }}>Micros</option>
                                <option value="Taxis" {{ $linea->tipovehiculo === 'Taxis' ? 'selected' : '' }}>Taxis</option>
                                <option value="MiniBuses" {{ $linea->tipovehiculo === 'MiniBuses' ? 'selected' : '' }}>MiniBuses</option>
                            </select>
                            @error('linea.tipovehiculo')
                                <span style="color: red; font-size: 0.875rem; display: block; margin-top: 0.25rem;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>



                    <div>
                        <div style="margin-bottom: 0.5rem;">
                            <label style="margin-right: 0.5rem;">Descripción:</label>
                        </div>
                        <div style="width: 100%;">
                            <textarea wire:model.defer="linea.descripcion" name="descripcion" rows="4" style="width: 100%; border-radius: 0.375rem; padding: 0.5rem;"></textarea>
                            @error('linea.descripcion')
                                <span style="color: red; font-size: 0.875rem; display: block; margin-top: 0.25rem;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div>
                        <div style="margin-bottom: 0.5rem;">
                            <label style="margin-right: 0.5rem;">Grupo:</label>
                        </div>
                        <div style="width: 100%;">
                            <select wire:model.defer="linea.grupo_id" style="width: 100%; border-radius: 0.375rem; padding: 0.5rem;">
                                <option value="">Selecciona un grupo</option>
                                @foreach ($grupos as $grupo)
                                    <option value="{{ $grupo->id }}">{{ $grupo->codgrupo }} - {{ $grupo->id }}</option>
                                @endforeach
                            </select>

                            @error('linea.grupo_id')
                                <span style="color: red; font-size: 0.875rem; display: block; margin-top: 0.25rem;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </slot>
            </div>

            <!-- Ranura (slot) para el footer -->
            <div class="bg-gray-200 py-4 px-6 rounded-b text-right">
                <slot name="footer">
                    <button style="background-color: red; color: white;" class="py-2 px-4 rounded" wire:click="$set('open', false)">Cancelar</button>
                    <button style="background-color: green; color: white;" class="py-2 px-4 rounded" wire:click="save">Actualizar</button>
                </slot>
            </div>
        </div>
    </x-modal>
</div>
