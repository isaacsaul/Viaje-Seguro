<div>
    <button class="font-bold py-2 px-4 rounded" style="background-color: rgb(21, 201, 214)" wire:click="$set('open' ,true)">
        Crear nuevo post
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
                            @if ($imagen instanceof \Livewire\TemporaryUploadedFile)
                                <img src="{{ $imagen->temporaryUrl() }}">
                            @else
                                <img src="{{ $imagen->url }}">
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

                            <textarea wire:model.defer="contenido" class="w-full" name="mensaje" rows="4"></textarea>
                            {{-- {{$content}} --}}
                            @error('contenido')
                               <span style="color: red">
                                {{$message}}
                               </span>
                            @enderror
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
                    <button style="background-color: rgb(168, 43, 226)" class="py-2 px-4 rounded" wire:click="$set('open', false)">Cancelar</button>
                    <button class="py-2 px-4 rounded" style="background-color: rgb(67, 216, 204)" wire:click="save">Crear</button>
                </slot>
            </div>
        </div>

    </x-modal>




</div>
