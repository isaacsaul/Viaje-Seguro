<div>
    <a wire:click="$set('open', true)" class="btn btn-green text-white" style="background-color: green; padding:10px; border-radius: 3px;">
        <i class="fas fa-edit"></i>
    </a>

    <x-modal wire:model="open">
        <div class="rounded shadow-lg">
            <!-- Título del modal -->
            <div class="bg-gray-200 py-4 px-6 rounded-t flex items-center justify-center">
                <h2 class="font-bold text-lg">Editar la noticia</h2>
            </div>

            <!-- Contenido -->
            <div class="p-6 space-y-4">
                <!-- Imagen previa -->
                <div>
                    @if ($imagen)
                        <img src="{{ $imagen->temporaryUrl() }}" class="w-48 h-auto mb-2">
                    @else
                        <img src="{{ Storage::url($noticia->imagen) }}" class="w-48 h-auto mb-2">
                    @endif
                </div>

                <!-- Título -->
                <div>
                    <label class="block mb-1 font-semibold">Título del contenido:</label>
                    <input type="text" class="w-full rounded border-gray-300" wire:model="noticia.titulo">
                    @error('noticia.titulo')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Contenido -->
                <div>
                    <label class="block mb-1 font-semibold">Contenido de la noticia:</label>
                    <textarea wire:model="noticia.contenido" class="w-full rounded border-gray-300" rows="4"></textarea>
                    @error('noticia.contenido')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Imagen nueva -->
                <div>
                    <label class="block mb-1 font-semibold">Actualizar imagen (opcional):</label>
                    <input type="file" wire:model="imagen">
                    @error('imagen')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Footer -->
            <div class="bg-gray-200 py-4 px-6 rounded-b text-right">
                <button class="bg-red-600 text-white py-2 px-4 rounded mr-2" wire:click="$set('open', false)">Cancelar</button>
                <button class="bg-green-600 text-white py-2 px-4 rounded" wire:click="save">Actualizar</button>
            </div>
        </div>
    </x-modal>
</div>
