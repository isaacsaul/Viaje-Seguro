<div>
    <button class="font-bold py-2 px-4 rounded" style="background-color: rgb(21, 201, 214)" wire:click="$set('open', true)">
        Crear nueva movilidad
    </button>

    <x-modal wire:model="open">
        <div class="rounded shadow-lg">
            <!-- Ranura (slot) para el título -->
            <div class="bg-gray-200 py-4 px-6 rounded-t flex items-center justify-center">
                <slot name="title">Crear una nueva movilidad</slot>
            </div>

            <!-- Ranura (slot) para el contenido -->
            <div class="p-6">
                <slot name="content">
                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Placa:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="placa">
                            @error('placa')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Color:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="color">
                            @error('color')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Marca:</label>
                        </div>
                        <div class="w-full" >
                            <input type="text" class="w-full rounded" wire:model.defer="marca">
                            @error('marca')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Modelo:</label>
                        </div>
                        <div class="w-full" >
                            <input type="text" class="w-full rounded" wire:model.defer="modelo">
                            @error('modelo')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Capacidad:</label>
                        </div>
                        <div class="flex items-center">
                            <!-- Input reducido -->
                            <input type="text" class="w-100 rounded" wire:model.defer="capacidad">

                            <!-- Texto estático "PERSONA" -->
                            <span class="ml-2">Personas</span>

                            <!-- Manejo de errores -->
                            @error('capacidad')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Número de SOAT:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="no_soat">
                            @error('no_soat')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Línea ID:</label>
                        </div>
                        <div class="w-full">
                            <select wire:model.defer="linea_id" class="w-full rounded">
                                <option value="">Selecciona una línea</option>
                                @foreach ($lineas as $linea)
                                    <option value="{{ $linea->id }}">{{ $linea->codigo }}</option>
                                @endforeach
                            </select>

                            @error('linea_id')
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
                    <button class="py-2 px-4 rounded" style="background-color: rgb(67, 216, 204)" wire:click="save">Crear</button>
                </slot>
            </div>
        </div>
    </x-modal>
</div>
