<div>

    <button class="py-2 px-4 rounded"
            style="background-color: rgb(21, 201, 214); color: white; font-weight: 400; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; box-shadow: 2px 2px 5px rgba(0,0,0,0.2); transition: background-color 0.3s ease;"
            wire:click="$set('open', true)"
            onmouseover="this.style.backgroundColor='rgb(15, 158, 168)'"
            onmouseout="this.style.backgroundColor='rgb(21, 201, 214)'">
            Crear nuevo chofer
    </button>

    <x-modal wire:model="open">
        <div class="rounded shadow-lg">
            <!-- Ranura (slot) para el título -->
            <div class="bg-gray-200 py-4 px-6 rounded-t flex items-center justify-center">
                <slot name="title">Crear un nuevo chofer</slot>
            </div>

            <!-- Ranura (slot) para el contenido -->
            <div class="p-6">
                <slot name="content">
                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">CI:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="ci">
                            @error('ci')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Correo:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="correo">
                            @error('correo')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Nombres:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="nombres">
                            @error('nombres')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Apellidos:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="apellidos">
                            @error('apellidos')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Fecha de Ingreso:</label>
                        </div>
                        <div class="w-full">
                            <input type="date" class="w-full rounded" wire:model.defer="fecha_ingreso">
                            @error('fecha_ingreso')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Celular:</label>
                        </div>
                        <div class="w-full">
                            <input type="number" class="w-full rounded" wire:model.defer="celular" placeholder="Ej: 71234567" min="60000000" max="79999999">
                            @error('celular')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Estado Civil:</label>
                        </div>
                        <div class="w-full">
                            <select class="w-full rounded" wire:model.defer="estado_civil">
                                <option value="">Selecciona un estado civil</option>
                                <option value="soltero">Soltero/a</option>
                                <option value="casado">Casado/a</option>
                                <option value="divorciado">Divorciado/a</option>
                                <option value="viudo">Viudo/a</option>
                            </select>
                            @error('estado_civil')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">No. Domicilio:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="no_domicilio">
                            @error('no_domicilio')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Barrio Domicilio:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="barrio_domicilio">
                            @error('barrio_domicilio')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Ciudad:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="ciudad">
                            @error('ciudad')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">No. Licencia:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="no_licencia">
                            @error('no_licencia')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Lugar de Nacimiento:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="lugar_nacimiento">
                            @error('lugar_nacimiento')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">ID de Movilidad:</label>
                        </div>
                        <div class="w-full">
                            <select wire:model.defer="movilidad_id" class="w-full rounded">
                                <option value="">Selecciona una movilidad</option>
                                @foreach ($movilidades as $movilidad)
                                    <option value="{{ $movilidad->id }}">{{ $movilidad->placa }}</option>
                                @endforeach
                            </select>
                            @error('movilidad_id')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">ID de Tipo Socio:</label>
                        </div>
                        <div class="w-full">
                            <select wire:model.defer="tiposocio_id" class="w-full rounded">
                                <option value="">Selecciona un tipo de socio</option>
                                @foreach ($tiposocios as $tiposocio)
                                    <option value="{{ $tiposocio->id }}">{{ $tiposocio->nombresocio }}</option>
                                @endforeach
                            </select>
                            @error('tiposocio_id')
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
