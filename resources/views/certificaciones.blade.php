<x-app-layout>
    <x-slot name="header">
        <div class="mb-4 p-6 bg-blue-50 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4 text-blue-800">
                📝 <span>Información Importante</span>
            </h2>
            <p class="text-gray-700 text-lg mb-4">
                En esta sección encontrarás varios formularios para memorandums y certificaciones. A continuación, te explicamos cómo utilizarlos:
            </p>
            <ul class="list-disc list-inside ">
                <li class="mb-2">
                    <span class="font-semibold">1. Introduce el número de carnet:</span>
                    🆔 Escribe el número de carnet en el formulario correspondiente.
                </li>
                <li class="mb-2">
                    <span class="font-semibold">2. Haz clic en el botón correspondiente:</span>
                    🔘 Selecciona el botón adecuado para mostrar los datos del registro.
                </li>
                <li class="mb-2">
                    <span class="font-semibold">3. Edición de Datos:</span>
                    ✏️ Una vez que se muestren los datos, podrás editarlos según sea necesario.
                </li>
            </ul>

        </div>

    </x-slot>

    <div class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Grid de tarjetas -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Certificado -->
                <div class="transform transition-all duration-300 hover:scale-[1.02]">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl">
                        <div class="bg-[#28b0a3] px-6 py-4">
                            <h3 class="text-lg font-semibold text-white flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Formulario de Certificado
                            </h3>
                        </div>
                        <div class="p-6">
                            @livewire('certificado-form')
                        </div>
                    </div>
                </div>

                <!-- Memo de Suspensión -->
                <div class="transform transition-all duration-300 hover:scale-[1.02]">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl">
                        <div class="bg-[#28b0a3] px-6 py-4">
                            <h3 class="text-lg font-semibold text-white flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                                Memo de Suspensión
                            </h3>
                        </div>
                        <div class="p-6">
                            @livewire('memo-suspension-form')
                        </div>
                    </div>
                </div>

                <!-- Formulario de Reconocimiento -->
                <div class="transform transition-all duration-300 hover:scale-[1.02]">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl">
                        <div class="bg-[#28b0a3] px-6 py-4">
                            <h3 class="text-lg font-semibold text-white flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Formulario de Reconocimiento
                            </h3>
                        </div>
                        <div class="p-6">
                            @livewire('reconocimiento-form')
                        </div>
                    </div>
                </div>

                <!-- Memo Suspensión Lapso -->
                <div class="transform transition-all duration-300 hover:scale-[1.02]">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl">
                        <div class="bg-[#28b0a3] px-6 py-4">
                            <h3 class="text-lg font-semibold text-white flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Memo Suspensión Lapso
                            </h3>
                        </div>
                        <div class="p-6">
                            @livewire('memo-suspension-lapso-form')
                        </div>
                    </div>
                </div>

                <!-- Llamada de Atención -->
                <div class="transform transition-all duration-300 hover:scale-[1.02]">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl">
                        <div class="bg-[#28b0a3] px-6 py-4">
                            <h3 class="text-lg font-semibold text-white flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                                Llamada de Atención
                            </h3>
                        </div>
                        <div class="p-6">
                            @livewire('llamada-atencion-form')
                        </div>
                    </div>
                </div>

                <!-- Memo de Aceptación -->
                <div class="transform transition-all duration-300 hover:scale-[1.02]">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl">
                        <div class="bg-[#28b0a3] px-6 py-4">
                            <h3 class="text-lg font-semibold text-white flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Memo de Aceptación
                            </h3>
                        </div>
                        <div class="p-6">
                            @livewire('memo-aceptacion-form')
                        </div>
                    </div>
                </div>

                <!-- Memo de Control -->
                <div class="transform transition-all duration-300 hover:scale-[1.02]">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl">
                        <div class="bg-[#28b0a3] px-6 py-4">
                            <h3 class="text-lg font-semibold text-white flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                                Memo de Control
                            </h3>
                        </div>
                        <div class="p-6">
                            @livewire('memo-control-form')
                        </div>
                    </div>
                </div>

                <!-- Citación de grupo -->
                <div class="transform transition-all duration-300 hover:scale-[1.02]">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl">
                        <div class="bg-[#28b0a3] px-6 py-4">
                            <h3 class="text-lg font-semibold text-white flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                Citación de grupo
                            </h3>
                        </div>
                        <div class="p-6">
                            @livewire('citacion-form')
                        </div>
                    </div>
                </div>

                <!-- Instructivo -->
                <div class="transform transition-all duration-300 hover:scale-[1.02]">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl">
                        <div class="bg-[#28b0a3] px-6 py-4">
                            <h3 class="text-lg font-semibold text-white flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                                Instructivo
                            </h3>
                        </div>
                        <div class="p-6">
                            @livewire('instructivo-form')
                        </div>
                    </div>
                </div>

                <!-- Citación Personal -->
                <div class="transform transition-all duration-300 hover:scale-[1.02]">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl">
                        <div class="bg-[#28b0a3] px-6 py-4">
                            <h3 class="text-lg font-semibold text-white flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                Citación Personal
                            </h3>
                        </div>
                        <div class="p-6">
                            @livewire('citacion-personal-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @media (max-width: 640px) {
            .grid {
                gap: 1rem;
            }

            .px-4 {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }

        .hover\:scale-\[1\.02\]:hover {
            transform: scale(1.02);
        }

        .transform {
            transition-property: transform;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 300ms;
        }
    </style>
</x-app-layout>