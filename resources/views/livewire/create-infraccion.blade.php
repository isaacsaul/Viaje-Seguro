<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <button class="py-2 px-4 rounded"
                style="background-color: rgb(21, 201, 214); color: white; font-weight: 400; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; box-shadow: 2px 2px 5px rgba(0,0,0,0.2); transition: background-color 0.3s ease;"
                wire:click="$set('open', true)"
                onmouseover="this.style.backgroundColor='rgb(15, 158, 168)'"
                onmouseout="this.style.backgroundColor='rgb(21, 201, 214)'">
                Crear nueva infraccion
        </button>

        <x-modal wire:model="open">
            <div class="rounded shadow-lg">
                <!-- Ranura (slot) para el título -->
                <div class="bg-gray-200 py-4 px-6 rounded-t flex items-center justify-center">
                    <slot name="title">Crear una nueva infracción</slot>
                </div>

                <!-- Ranura (slot) para el contenido -->
                <div class="p-6">
                    <slot name="content">
                        <div>
                            <div>
                                <label style="margin-right: 0.5rem;">Tipo de infracción:</label>
                            </div>
                            <div class="w-full">
                                <select class="w-full rounded" wire:model.defer="tipoinfraccion">
                                    <option value="">Selecciona un tipo de infracción</option>
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
                                @error('tipoinfraccion')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div>
                            <div>
                                <label style="margin-right: 0.5rem;">Fecha de infracción:</label>
                            </div>
                            <div class="w-full">
                                <input type="date" class="w-full rounded" wire:model.defer="fechainfraccion">
                                @error('fechainfraccion')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <div>
                                <label style="margin-right: 0.5rem;">Estado:</label>
                            </div>
                            <div class="w-full">
                                <select wire:model.defer="estado" class="w-full rounded">
                                    <option value="">Selecciona el estado</option>
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                    <option value="En proceso">En proceso</option>
                                </select>
                                @error('estado')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <div>
                                <label style="margin-right: 0.5rem;">ID de Sanción:</label>
                            </div>
                            <div class="w-full">
                                <select wire:model.defer="id_sancion" class="w-full rounded">
                                    <option value="">Selecciona una sanción</option>
                                    @foreach ($sanciones as $sancion)
                                      <option value="{{ $sancion->id }}">{{ $sancion->id }} - {{ $sancion->tiposancion }}</option>
                                    @endforeach
                                </select>
                                @error('id_sancion')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <div>
                                <label style="margin-right: 0.5rem;">ID del Chofer:</label>
                            </div>
                            <div class="w-full">
                                <select wire:model.defer="chofer_id" class="w-full rounded">
                                    <option value="">Selecciona el ID del chofer</option>
                                    @foreach ($choferes as $chofer)
                                      <option value="{{ $chofer->id }}">{{ $chofer->id }} - {{ $chofer->nombres }}</option>
                                    @endforeach
                                </select>
                                @error('chofer_id')
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
</div>
