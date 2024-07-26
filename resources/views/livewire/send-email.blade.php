<div>
    <button class="font-bold py-2 px-4 rounded" style="background-color: green" wire:click="$set('openEmailModal', true)">
        Correo
    </button>

    <!-- Modal para enviar correo electrónico -->
    <x-modal wire:model="openEmailModal">
        <div class="rounded shadow-lg">
            <!-- Ranura (slot) para el título -->
            <div class="bg-gray-200 py-4 px-6 rounded-t flex items-center justify-center">
                <slot name="title">Enviar correo electrónico</slot>
            </div>

            <!-- Ranura (slot) para el contenido -->
            <div class="p-6">
                <form wire:submit.prevent="sendEmail">
                    <div class="form-group p-6 mb-5">
                        <label for="email_receiver">Correo Electrónico Destinatario:</label>
                        <input type="email" class="form-control w-64 h-12 ml-4" wire:model.defer="email_receiver">
                        <p style="color: red ; padding-top:20px">Por favor, espere la confirmación del envío del correo electrónico.</p>
                    </div>
                    <button style="background-color: blueviolet" class="py-2 px-4 ml-96 rounded" wire:click="$set('openEmailModal', false)">Cancelar</button>
                    <button style="background-color: rgb(55, 165, 159)" class="py-2 px-6 rounded" type="submit">Enviar</button>
                </form>
            </div>

            <!-- Ranura (slot) para el footer -->
            <div class="bg-gray-200 py-4 px-6 rounded-b text-right">
                <slot name="footer">

                </slot>
            </div>
        </div>
    </x-modal>

    <!-- Modal para mostrar mensaje de confirmación -->
    <x-modal wire:model="openConfirmationModal">
        <div class="rounded shadow-lg">
            <!-- Ranura (slot) para el título -->
            <div style="background-color: rgb(63, 206, 206)" class=" py-4 px-6 rounded-t flex items-center justify-center">
                <slot name="title">Correo enviado exitosamente</slot>
            </div>

            <!-- Ranura (slot) para el contenido -->
            <div class="rounded shadow-lg p-6 flex justify-center items-center flex-col"  style="display: flex; align-items: center;">
                <img src="https://cdn-icons-gif.flaticon.com/6416/6416397.gif" loading="lazy" alt="Envío" title="Envío" width="150" height="150" style="margin-right: 10px;">
                <p>El correo electrónico se envió correctamente.</p>
            </div>

            


            <!-- Ranura (slot) para el footer -->
            <div style="background-color: rgb(63, 206, 206)" class="py-4 px-6 rounded-b text-right">
                <button class="py-2 px-4 rounded" wire:click="$set('openConfirmationModal', false)">Cerrar</button>
            </div>
        </div>
    </x-modal>
</div>
