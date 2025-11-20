<div>
    <button class="py-2 px-4 rounded"
            style="background-color: rgb(21, 201, 214); color: white; font-weight: 400; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; box-shadow: 2px 2px 5px rgba(0,0,0,0.2); transition: background-color 0.3s ease;"
            wire:click="$set('open', true)"
            onmouseover="this.style.backgroundColor='rgb(15, 158, 168)'"
            onmouseout="this.style.backgroundColor='rgb(21, 201, 214)'">
            Crear nueva noticia
    </button>

    <x-modal wire:model="open">

        <div class="rounded shadow-lg">
            <!-- Ranura (slot) para el título -->
            <div class="bg-gray-200 py-4 px-6 rounded-t flex items-center justify-center">
                <slot name="title">Crear un nueva noticia </slot>
            </div>

            <!-- Ranura (slot) para el contenido -->
            <div class="p-6">
                <slot name="content">
                    <div>


                        @if ($imagen)
                            @if ($imagen->extension() === 'jpg' || $imagen->extension() === 'jpeg' || $imagen->extension() === 'png' || $imagen->extension() === 'gif')
                                <div class="mb-4">
                                    <img src="{{ $imagen->temporaryUrl() }}" alt="Imagen de la noticia" class="w-full h-auto">
                                </div>
                            @else
                                <div style="color: red ; font-size: 1.2rem;">
                                    El archivo seleccionado no es una imagen.
                                </div>
                            @endif
                        @endif



                        <div >
                            <label style="margin-right: 0.5rem;">Titulo de la noticia</label>

                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="titulo">
                            {{-- {{$title}} --}}

                            @error('titulo')
                               <span style="color: red">
                                {{$message}}
                               </span>
                            @enderror
                        </div>

                    </div>



                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Contenido de la noticia</label>
                        </div>
                        <div class="w-full" >

                            <textarea wire:model.defer="contenido" class="w-full rounded border-gray-300" name="mensaje" rows="4" maxlength="255"></textarea>                            {{-- {{$content}} --}}
                            @error('contenido')
                               <span style="color: red">
                                {{$message}}
                               </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="mr-2">Imagen de la noticia</label>
                        <input type="file" wire:model="imagen" accept="image/*" class="w-full">
                        @error('imagen')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
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
