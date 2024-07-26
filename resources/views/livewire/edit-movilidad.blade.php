<div>
    <a wire:click="$set('open', true)">
        <i style="background-color: green; padding: 0.5rem; border-radius: 3px;" class="fas fa-edit text-white"></i>
    </a>

    <x-modal wire:model="open">
        <div class="rounded shadow-lg">
            <!-- Ranura (slot) para el título -->
            <div class="bg-gray-200 py-4 px-6 rounded-t flex items-center justify-center">
                <slot name="title">Editar movilidad</slot>
                {{$movilidad->placa}} <!-- Mostrar la placa de la movilidad -->
            </div>

            <!-- Ranura (slot) para el contenido -->
            <div class="p-6">
                <slot name="content">
                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Placa:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="movilidad.placa">
                            @error('movilidad.placa')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">color:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="movilidad.color">
                            @error('movilidad.color')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Marca:</label>
                        </div>
                        <div class="w-full" >
                            <input type="text" class="w-full rounded" wire:model.defer="movilidad.marca">
                            @error('movilidad.marca')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Modelo:</label>
                        </div>
                        <div class="w-full" >
                            <input type="text" class="w-full rounded" wire:model.defer="movilidad.modelo">
                            @error('movilidad.modelo')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Capacidad:</label>
                        </div>
                        <div class="w-full" >
                            <input type="text" class="w-full rounded" wire:model.defer="movilidad.capacidad">
                            @error('movilidad.capacidad')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">No. SOAT:</label>
                        </div>
                        <div class="w-full" >
                            <input type="text" class="w-full rounded" wire:model.defer="movilidad.no_soat">
                            @error('movilidad.no_soat')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Línea:</label>
                        </div>
                        <div class="w-full">
                            <select wire:model.defer="movilidad.linea_id" class="w-full rounded">
                                <option value="">Selecciona una línea</option>
                                @foreach ($lineas as $linea)
                                    <option value="{{ $linea->id }}">{{ $linea->codigo }} - {{ $linea->id }}</option>
                                @endforeach
                            </select>

                            @error('movilidad.linea_id')
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
