<div>
    <a wire:click="$set('open', true)">
        <i style="background-color: green; padding: 0.5rem; border-radius: 3px;" class="fas fa-edit text-white"></i>
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
                        <div>
                            <label style="margin-right: 0.5rem;">Código:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="linea.codigo">
                            @error('linea.codigo')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Tipo de vehículo:</label>
                        </div>
                        <div class="w-full" >
                            <input type="text" class="w-full rounded" wire:model.defer="linea.tipovehiculo">
                            @error('linea.tipovehiculo')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Descripción:</label>
                        </div>
                        <div class="w-full" >
                            <textarea wire:model.defer="linea.descripcion" class="w-full" name="descripcion" rows="4"></textarea>
                            @error('linea.descripcion')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Grupo:</label>
                        </div>
                        <div class="w-full">
                            <select wire:model.defer="linea.grupo_id" class="w-full rounded">
                                <option value="">Selecciona un grupo</option>
                                @foreach ($grupos as $grupo)
                                    <option value="{{ $grupo->id }}">{{ $grupo->codgrupo }} - {{ $grupo->id }}</option>
                                @endforeach
                            </select>

                            @error('linea.grupo_id')
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
