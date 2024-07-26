<div>
    <a wire:click="$set('open', true)">
        <i style="background-color: green; padding: 0.5rem; border-radius: 3px;" class="fas fa-edit text-white"></i>
    </a>

    <x-modal wire:model="open">
        <div class="rounded shadow-lg">
            <!-- Ranura (slot) para el título -->
            <div class="bg-gray-200 py-4 px-6 rounded-t flex items-center justify-center">
                <slot name="title">Editar sanción</slot>
                {{$sancion->tiposancion}}
            </div>

            <!-- Ranura (slot) para el contenido -->
            <div class="p-6">

                <slot name="content">
                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Tipo de sanción:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model="sancion.tiposancion">
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Descripción de la sanción:</label>
                        </div>
                        <div class="w-full">
                            <textarea wire:model="sancion.descripcion" class="w-full" name="descripcion" rows="4"></textarea>
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
