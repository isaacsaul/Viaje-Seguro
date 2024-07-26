<div>
    <a wire:click="$set('open', true)">
        <i style="background-color: green; padding: 0.5rem; border-radius: 3px;" class="fas fa-edit text-white"></i>
    </a>

    <x-modal wire:model="open">
        <div class="rounded shadow-lg">
            <!-- Ranura (slot) para el título -->
            <div class="bg-gray-200 py-4 px-6 rounded-t flex items-center justify-center">
                <slot name="title">Editar chofer</slot>
                {{ $chofer->nombres }} {{ $chofer->apellidos }} <!-- Mostrar el nombre y apellido del chofer -->
            </div>

            <!-- Ranura (slot) para el contenido -->
            <div class="p-6">
                <slot name="content">
                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">CI:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="chofer.ci">
                            @error('chofer.ci')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Correo:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="chofer.correo">
                            @error('chofer.correo')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Nombres:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="chofer.nombres">
                            @error('chofer.nombres')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Apellidos:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="chofer.apellidos">
                            @error('chofer.apellidos')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Fecha de Ingreso:</label>
                        </div>
                        <div class="w-full">
                            <input type="date" class="w-full rounded" wire:model.defer="chofer.fecha_ingreso">
                            @error('chofer.fecha_ingreso')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Celular:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="chofer.celular">
                            @error('chofer.celular')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Estado Civil:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="chofer.estado_civil">
                            @error('chofer.estado_civil')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">No. Domicilio:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="chofer.no_domicilio">
                            @error('chofer.no_domicilio')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Barrio Domicilio:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="chofer.barrio_domicilio">
                            @error('chofer.barrio_domicilio')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Ciudad:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="chofer.ciudad">
                            @error('chofer.ciudad')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">No. Licencia:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="chofer.no_licencia">
                            @error('chofer.no_licencia')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Lugar de Nacimiento:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="chofer.lugar_nacimiento">
                            @error('chofer.lugar_nacimiento')
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
                    <button style="background-color: blueviolet" class="py-2 px-4 rounded" wire:click="$set('open', false)">Cancelar</button>
                    <button class="py-2 px-4 rounded" wire:click="save">Actualizar</button>
                </slot>
            </div>
        </div>
    </x-modal>
</div>
