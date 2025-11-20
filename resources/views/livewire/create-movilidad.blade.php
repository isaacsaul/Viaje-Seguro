<div>

    <button class="py-2 px-4 rounded"
            style="background-color: rgb(21, 201, 214); color: white; font-weight: 400; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; box-shadow: 2px 2px 5px rgba(0,0,0,0.2); transition: background-color 0.3s ease;"
            wire:click="$set('open', true)"
            onmouseover="this.style.backgroundColor='rgb(15, 158, 168)'"
            onmouseout="this.style.backgroundColor='rgb(21, 201, 214)'">
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
                            <select wire:model.defer="color" class="w-full rounded">
                                <option value="">Selecciona un color</option>
                                <option value="Rojo">Rojo</option>
                                <option value="Verde">Verde</option>
                                <option value="Azul">Azul</option>
                                <option value="Amarillo">Amarillo</option>
                                <option value="Negro">Negro</option>
                                <option value="Blanco">Blanco</option>
                                <option value="Gris">Gris</option>
                                <option value="Naranja">Naranja</option>
                                <option value="Morado">Morado</option>
                            </select>
                            @error('color')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Marca:</label>
                        </div>
                        <div class="w-full">
                            <select wire:model.defer="marca" class="w-full rounded">
                                <option value="">Selecciona una marca</option>
                                <option value="Toyota">Toyota</option>
                                <option value="Ford">Ford</option>
                                <option value="Chevrolet">Chevrolet</option>
                                <option value="Honda">Honda</option>
                                <option value="Nissan">Nissan</option>
                                <option value="Hyundai">Hyundai</option>
                                <option value="Kia">Kia</option>
                                <option value="Volkswagen">Volkswagen</option>
                                <option value="BMW">BMW</option>
                                <option value="Mercedes-Benz">Mercedes-Benz</option>
                                <option value="Audi">Audi</option>
                                <option value="Subaru">Subaru</option>
                                <option value="Mazda">Mazda</option>
                                <option value="Porsche">Porsche</option>
                                <option value="Lexus">Lexus</option>
                                <option value="Jaguar">Jaguar</option>
                                <option value="Land Rover">Land Rover</option>
                                <option value="Fiat">Fiat</option>
                                <option value="Renault">Renault</option>
                                <option value="Peugeot">Peugeot</option>
                            </select>
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
                            <!-- Input para capacidad con tipo number -->
                            <input type="number" min="1" class="w-100 rounded" wire:model.defer="capacidad" placeholder="Ingrese capacidad" required>

                            <!-- Texto estático "PERSONAS" -->
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
                    <!-- Botón de cancelar con fondo rojo y texto blanco -->
                    <button class="py-2 px-4 rounded text-white" style="background-color: red;" wire:click="$set('open', false)">Cancelar</button>
                    <!-- Botón de crear con fondo verde y texto blanco -->
                    <button class="py-2 px-4 rounded text-white" style="background-color: green;" wire:click="save">Crear</button>
                </slot>
            </div>

        </div>
    </x-modal>
</div>
