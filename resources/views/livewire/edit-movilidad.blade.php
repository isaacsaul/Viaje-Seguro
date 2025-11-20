<div>
    <a wire:click="$set('open', true)" style="background-color: green; padding: 10px; border-radius: 3px; color: white; text-decoration: none; cursor: pointer;">
        <i class="fas fa-edit"></i>
    </a>

    <x-modal wire:model="open">
        <div style="border-radius: 0.5rem; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
            <!-- Título -->
            <div style="background-color: #e2e8f0; padding: 1rem 1.5rem; border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem; display: flex; justify-content: center; align-items: center;">
                <slot name="title">Editar movilidad</slot>
                {{$movilidad->placa}}
            </div>

            <!-- Contenido -->
            <div style="padding: 1.5rem;">
                <slot name="content">
                    <div style="margin-bottom: 1rem;">
                        <div style="margin-bottom: 0.5rem; text-align: left;">
                            <label>Placa:</label>
                        </div>
                        <div style="width: 100%;">
                            <input type="text" wire:model.defer="movilidad.placa" style="width: 100%; border-radius: 0.375rem; padding: 0.5rem;">
                            @error('movilidad.placa')
                               <span style="color: red; font-size: 0.875rem; display: block; margin-top: 0.25rem;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <div style="margin-bottom: 0.5rem; text-align: left;">
                            <label>Color:</label>
                        </div>
                        <div style="width: 100%;">
                            <input type="text" wire:model.defer="movilidad.color" style="width: 100%; border-radius: 0.375rem; padding: 0.5rem;">
                            @error('movilidad.color')
                               <span style="color: red; font-size: 0.875rem; display: block; margin-top: 0.25rem;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <div style="margin-bottom: 0.5rem; text-align: left;">
                            <label>Marca:</label>
                        </div>
                        <div style="width: 100%;">
                            <input type="text" wire:model.defer="movilidad.marca" style="width: 100%; border-radius: 0.375rem; padding: 0.5rem;">
                            @error('movilidad.marca')
                               <span style="color: red; font-size: 0.875rem; display: block; margin-top: 0.25rem;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <div style="margin-bottom: 0.5rem; text-align: left;">
                            <label>Modelo:</label>
                        </div>
                        <div style="width: 100%;">
                            <input type="text" wire:model.defer="movilidad.modelo" style="width: 100%; border-radius: 0.375rem; padding: 0.5rem;">
                            @error('movilidad.modelo')
                               <span style="color: red; font-size: 0.875rem; display: block; margin-top: 0.25rem;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <div style="margin-bottom: 0.5rem; text-align: left;">
                            <label>Capacidad:</label>
                        </div>
                        <div style="width: 100%;">
                            <input type="text" wire:model.defer="movilidad.capacidad" style="width: 100%; border-radius: 0.375rem; padding: 0.5rem;">
                            @error('movilidad.capacidad')
                               <span style="color: red; font-size: 0.875rem; display: block; margin-top: 0.25rem;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <div style="margin-bottom: 0.5rem; text-align: left;">
                            <label>No. SOAT:</label>
                        </div>
                        <div style="width: 100%;">
                            <input type="text" wire:model.defer="movilidad.no_soat" style="width: 100%; border-radius: 0.375rem; padding: 0.5rem;">
                            @error('movilidad.no_soat')
                               <span style="color: red; font-size: 0.875rem; display: block; margin-top: 0.25rem;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <div style="margin-bottom: 0.5rem; text-align: left;">
                            <label>Línea:</label>
                        </div>
                        <div style="width: 100%;">
                            <select wire:model.defer="movilidad.linea_id" style="width: 100%; border-radius: 0.375rem; padding: 0.5rem;">
                                <option value="">Selecciona una línea</option>
                                @foreach ($lineas as $linea)
                                    <option value="{{ $linea->id }}">{{ $linea->codigo }}</option>
                                @endforeach
                            </select>
                            @error('movilidad.linea_id')
                               <span style="color: red; font-size: 0.875rem; display: block; margin-top: 0.25rem;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </slot>
            </div>

            <!-- Footer -->
            <div style="background-color: #e2e8f0; padding: 1rem 1.5rem; border-bottom-left-radius: 0.5rem; border-bottom-right-radius: 0.5rem; text-align: right;">
                <slot name="footer">
                    <button style="background-color: red; color: white;" class="py-2 px-4 rounded" wire:click="$set('open', false)">Cancelar</button>
                    <button style="background-color: green; color: white;" class="py-2 px-4 rounded" wire:click="save">Actualizar</button>
                </slot>
            </div>
        </div>
    </x-modal>
</div>