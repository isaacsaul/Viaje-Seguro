<div>
    <a wire:click="$set('open' ,true)">
        <i  style="background-color: green ; padding: 0.5rem;  border-radius: 3px;  " class="fas fa-edit text-white"></i>
     </a>


     <x-modal wire:model="open">

        <div class="rounded shadow-lg">
            <!-- Ranura (slot) para el título -->
            <div class="bg-gray-200 py-4 px-6 rounded-t flex items-center justify-center">
                <slot name="title">Editar la noticia</slot>
                {{$noticia->titulo}}

            </div>

            <!-- Ranura (slot) para el contenido -->
            <div class="p-6">
                <slot name="content">
                    <div>
                        @if ($imagen)
                            @if ($imagen instanceof \Livewire\TemporaryUploadedFile)
                                <img src="{{ $imagen->temporaryUrl() }}">
                            {{-- @else
                                <img src="{{ Storage::url($post->image) }}"> --}}
                            @endif
                        @else
                            <img src="{{ Storage::url($noticia->imagen) }}">

                        @endif


                        <div >
                            <label style="margin-right: 0.5rem;">Titulo del Contenido:</label>

                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model="noticia.titulo">
                            {{-- {{$title}} --}}

                            {{-- @error('title')
                               <span style="color: red">
                                {{$message}}
                               </span>
                            @enderror --}}
                        </div>

                    </div>



                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Contenido de la noticia</label>
                        </div>
                        <div class="w-full" >

                            <textarea wire:model="noticia.contenido" class="w-full" name="mensaje" rows="4"></textarea>
                            {{-- {{$content}} --}}
                            {{-- @error('content')
                               <span style="color: red">
                                {{$message}}
                               </span>
                            @enderror --}}
                        </div>
                    </div>

                    <div>
                        <input type="file" wire:model='imagen'>
                        @error('imagen')
                               <span style="color: red">
                                {{$message}}
                               </span>
                            @enderror
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
