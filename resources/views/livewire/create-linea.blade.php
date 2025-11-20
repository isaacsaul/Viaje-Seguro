<div>

    <button class="py-2 px-4 rounded"
            style="background-color: rgb(21, 201, 214); color: white; font-weight: 400; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; box-shadow: 2px 2px 5px rgba(0,0,0,0.2); transition: background-color 0.3s ease;"
            wire:click="$set('open', true)"
            onmouseover="this.style.backgroundColor='rgb(15, 158, 168)'"
            onmouseout="this.style.backgroundColor='rgb(21, 201, 214)'">
            Crear nueva línea
    </button>

    <x-modal wire:model="open">
        <div class="rounded shadow-lg">
            <!-- Ranura (slot) para el título -->
            <div class="bg-gray-200 py-4 px-6 rounded-t flex items-center justify-center">
                <slot name="title">Crear una nueva línea</slot>
            </div>

            <!-- Ranura (slot) para el contenido -->
            <div class="p-6">
                <slot name="content">
                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Código:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="codigo">
                            @error('codigo')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Tipo de vehículo:</label>
                        </div>
                        <div class="w-full">
                            <select class="w-full rounded" wire:model.defer="tipovehiculo">
                                <option value="">Selecciona un tipo</option>
                                <option value="Carry´s">Carry´s</option>
                                <option value="Micros">Micros</option>
                                <option value="Taxis">Taxis</option>
                                <option value="MiniBuses">MiniBuses</option>
                            </select>
                            @error('tipovehiculo')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Descripción:</label>
                        </div>
                        <div class="w-full" >
                            <textarea wire:model.defer="descripcion" class="w-full" name="descripcion" rows="4"></textarea>
                            @error('descripcion')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Grupo:</label>
                        </div>
                        <div class="w-full">
                            <select wire:model.defer="grupo_id" class="w-full rounded">
                                <option value="">Selecciona un grupo</option>
                                @foreach ($grupos as $grupo)
                                    <option value="{{ $grupo->id }}">{{ $grupo->codgrupo }} - {{ $grupo->id }}</option>
                                @endforeach
                            </select>

                            @error('grupo_id')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </slot>
            </div>

            <!-- Ranura (slot) para el footer -->
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
