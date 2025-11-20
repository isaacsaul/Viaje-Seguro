<div>
    <a wire:click="$set('open', true)" class="btn btn-green text-white" style="background-color: green; padding:10px; border-radius: 3px;">
        <i class="fas fa-edit"></i>
    </a>

    <x-modal wire:model="open">
        <div class="rounded shadow-lg">
            <!-- Ranura (slot) para el título -->
            <div class="bg-gray-200 py-4 px-6 rounded-t flex items-center justify-center">
                <slot name="title">Editar infracción</slot>
                {{ $infraccion->id }}
            </div>

            <!-- Ranura (slot) para el contenido -->
            <div class="p-6">
                <slot name="content">
                    <div style="margin-bottom: 1rem;">
                        <div style="margin-bottom: 0.5rem; text-align: left;">
                            <label>Tipo de infracción:</label>
                        </div>
                        <div class="w-full">
                            <select class="w-full rounded" wire:model.defer="infraccion.tipoinfraccion">
                                <option value="">Selecciona un tipo</option>
                                <option value="Conducción temeraria o imprudente">Conducción temeraria o imprudente</option>
                                <option value="Incumplimiento de normativas de tráfico">Incumplimiento de normativas de tráfico</option>
                                <option value="Negativa a recoger pasajeros">Negativa a recoger pasajeros</option>
                                <option value="Cobro excesivo de tarifas">Cobro excesivo de tarifas</option>
                                <option value="Conducción bajo la influencia de sustancias">Conducción bajo la influencia de sustancias</option>
                                <option value="Maltrato o acoso a pasajeros">Maltrato o acoso a pasajeros</option>
                                <option value="Negligencia en el mantenimiento del vehículo">Negligencia en el mantenimiento del vehículo</option>
                                <option value="Falta de documentación">Falta de documentación</option>
                                <option value="Estacionamiento indebido u obstrucción">Estacionamiento indebido u obstrucción</option>
                                <option value="Incumplimiento de horarios o rutas">Incumplimiento de horarios o rutas</option>
                                <option value="Uso indebido del celular mientras se conduce">Uso indebido del celular mientras se conduce</option>
                                <option value="Falta de cortesía o atención al cliente">Falta de cortesía o atención al cliente</option>
                                <option value="Falta de higiene o limpieza en el vehículo">Falta de higiene o limpieza en el vehículo</option>
                                <option value="Infracciones de tráfico en general">Infracciones de tráfico en general</option>
                            </select>
                            @error('infraccion.tipoinfraccion')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <div style="margin-bottom: 0.5rem; text-align: left;">
                            <label>Fecha de infracción:</label>
                        </div>
                        <div class="w-full">
                            <input type="date" class="w-full rounded" wire:model.defer="infraccion.fechainfraccion">
                            @error('infraccion.fechainfraccion')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <div style="margin-bottom: 0.5rem; text-align: left;">
                            <label>Estado:</label>
                        </div>
                        <div class="w-full">
                            <select wire:model.defer="infraccion.estado" class="w-full rounded">
                                <option value="">Selecciona un estado</option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                                <option value="Pendiente">Pendiente</option>
                            </select>
                            @error('infraccion.estado')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <div style="margin-bottom: 0.5rem; text-align: left;">
                            <label>ID de Sanción:</label>
                        </div>
                        <div class="w-full">
                            <select wire:model.defer="infraccion.id_sancion" class="w-full rounded">
                                <option value="">Selecciona una sanción</option>
                                @foreach ($sanciones as $sancion)
                                    <option value="{{ $sancion->id }}">{{ $sancion->id }} - {{ $sancion->tiposancion }}</option>
                                @endforeach
                            </select>
                            @error('infraccion.id_sancion')
                               <span style="color: red">{{ $message }}</span>
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