<div>
    <a wire:click="$set('open', true)" class="btn btn-green text-white" style="background-color: green; padding:10px; border-radius: 3px;">
        <i class="fas fa-edit"></i>
    </a>

    <x-modal wire:model="open">
        <div class="rounded shadow-lg">
            <!-- Ranura (slot) para el título -->
            <div class="bg-gray-200 py-4 px-6 rounded-t flex items-center justify-center">
                <slot name="title">Editar chofer</slot>
                {{ $chofer->nombres }} {{ $chofer->apellidos }}
            </div>

            <!-- Ranura (slot) para el contenido -->
            <div class="p-6">
                <slot name="content">
                    <div style="margin-bottom: 1rem;">
                        <div style="margin-bottom: 0.5rem; text-align: left;">
                            <label>CI:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="chofer.ci">
                            @error('chofer.ci')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <div style="margin-bottom: 0.5rem; text-align: left;">
                            <label>Correo:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="chofer.correo">
                            @error('chofer.correo')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <div style="margin-bottom: 0.5rem; text-align: left;">
                            <label>Nombres:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="chofer.nombres">
                            @error('chofer.nombres')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <div style="margin-bottom: 0.5rem; text-align: left;">
                            <label>Apellidos:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="chofer.apellidos">
                            @error('chofer.apellidos')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <div style="margin-bottom: 0.5rem; text-align: left;">
                            <label>Fecha de Ingreso:</label>
                        </div>
                        <div class="w-full">
                            <input type="date" class="w-full rounded" wire:model.defer="chofer.fecha_ingreso">
                            @error('chofer.fecha_ingreso')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <div style="margin-bottom: 0.5rem; text-align: left;">
                            <label>Celular:</label>
                        </div>
                        <div class="w-full">
                            <input type="number" class="w-full rounded" wire:model.defer="chofer.celular" placeholder="Ej: 71234567" min="60000000" max="79999999">
                            @error('chofer.celular')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <div style="margin-bottom: 0.5rem; text-align: left;">
                            <label>Estado Civil:</label>
                        </div>
                        <div class="w-full">
                            <select class="w-full rounded" wire:model.defer="chofer.estado_civil">
                                <option value="">Selecciona un estado civil</option>
                                <option value="soltero">Soltero/a</option>
                                <option value="casado">Casado/a</option>
                                <option value="divorciado">Divorciado/a</option>
                                <option value="viudo">Viudo/a</option>
                            </select>
                            @error('chofer.estado_civil')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <div style="margin-bottom: 0.5rem; text-align: left;">
                            <label>No. Domicilio:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="chofer.no_domicilio">
                            @error('chofer.no_domicilio')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <div style="margin-bottom: 0.5rem; text-align: left;">
                            <label>Barrio Domicilio:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="chofer.barrio_domicilio">
                            @error('chofer.barrio_domicilio')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <div style="margin-bottom: 0.5rem; text-align: left;">
                            <label>Ciudad:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="chofer.ciudad">
                            @error('chofer.ciudad')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <div style="margin-bottom: 0.5rem; text-align: left;">
                            <label>No. Licencia:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="chofer.no_licencia">
                            @error('chofer.no_licencia')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <div style="margin-bottom: 0.5rem; text-align: left;">
                            <label>Lugar de Nacimiento:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="chofer.lugar_nacimiento">
                            @error('chofer.lugar_nacimiento')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <div style="margin-bottom: 0.5rem; text-align: left;">
                            <label>Movilidad:</label>
                        </div>
                        <div style="width: 100%;">
                            <select wire:model.defer="movilidad_id" style="width: 100%; border-radius: 0.375rem; padding: 0.5rem;">
                                <option value="">Selecciona una movilidad</option>
                                @foreach ($movilidades as $movilidad)
                                    <option value="{{ $movilidad->id }}">{{ $movilidad->placa }}</option>
                                @endforeach
                            </select>
                            @error('movilidad_id')
                                <span style="color: red; font-size: 0.875rem; display: block; margin-top: 0.25rem;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <div style="margin-bottom: 0.5rem; text-align: left;">
                            <label>Tipo Socio:</label>
                        </div>
                        <div style="width: 100%;">
                            <select wire:model.defer="tiposocio_id" style="width: 100%; border-radius: 0.375rem; padding: 0.5rem;">
                                <option value="">Selecciona un tipo de socio</option>
                                @foreach ($tiposocios as $tiposocio)
                                    <option value="{{ $tiposocio->id }}">{{ $tiposocio->nombresocio }}</option>
                                @endforeach
                            </select>
                            @error('tiposocio_id')
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