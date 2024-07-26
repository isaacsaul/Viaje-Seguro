<div>
    <button class="font-bold py-2 px-4 rounded" style="background-color: rgb(21, 201, 214)" wire:click="$set('open', true)">
        Crear nuevo grupo
    </button>

    <x-modal wire:model="open">
        <div class="rounded shadow-lg">
            <!-- Ranura (slot) para el título -->
            <div class="bg-gray-200 py-4 px-6 rounded-t flex items-center justify-center">
                <slot name="title">Crear un nuevo grupo</slot>
            </div>

            <!-- Ranura (slot) para el contenido -->
            <div class="p-6">
                <slot name="content">
                    <div>

                        <div>
                            <label style="margin-right: 0.5rem;">Código del grupo:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="codgrupo">
                            @error('codgrupo')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Descripción del grupo:</label>
                        </div>
                        <div class="w-full" >
                            <textarea wire:model.defer="descripcion" class="w-full" name="descripcion" rows="4"></textarea>
                            @error('descripcion')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Fecha de fundación:</label>
                        </div>
                        <div class="w-full">
                            <input type="date" class="w-full rounded" wire:model.defer="fechafundacion">
                            @error('fechafundacion')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <label style="margin-right: 0.5rem;">Encargado:</label>
                        </div>
                        <div class="w-full">
                            <input type="text" class="w-full rounded" wire:model.defer="encargado">
                            @error('encargado')
                               <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </slot>
            </div>

            <!-- Ranura (slot) para el footer -->
            <div class="bg-gray-200 py-4 px-6 rounded-b text-right">
                <slot name="footer">
                    <button style="background-color: blueviolet" class="py-2 px-4 rounded" wire:click="$set('open', false)">Cancelar</button>
                    <button class="py-2 px-4 rounded" style="background-color: rgb(67, 216, 204)" wire:click="save">Crear</button>
                </slot>
            </div>
        </div>
    </x-modal>
</div>
