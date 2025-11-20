<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Servicios - Sindicato de Transporte</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('img/login.png') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <!-- Navbar -->
            @if (Route::has('login'))
            <nav class="fixed top-0 left-0 right-0 z-50 bg-[#28b0a3] shadow-lg">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <img src="{{ asset('img/login.png')}}" alt="Logo Sindicato" class="w-[60px] h-auto">
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:flex sm:ml-10 sm:items-center">
                                <a href="{{ url('/') }}" class="text-white hover:text-[#eff2f2] transition-colors duration-300 font-medium">
                                    Home
                                </a>
                                <a href="{{ url('/services') }}" class="text-white hover:text-[#eff2f2] transition-colors duration-300 font-medium">
                                    Servicios
                                </a>
                                <a href="{{ url('/rutas') }}" class="text-white hover:text-[#eff2f2] transition-colors duration-300 font-medium">
                                    Rutas
                                </a>
                                <a href="{{ url('/quienes-somos') }}" class="text-white hover:text-[#eff2f2] transition-colors duration-300 font-medium">
                                    ¿Quiénes Somos?
                                </a>
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-white hover:text-[#eff2f2] transition-colors duration-300 font-medium">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="text-white hover:text-[#eff2f2] transition-colors duration-300 font-medium mr-4">Iniciar sesión</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="bg-white text-[#28b0a3] px-4 py-2 rounded-lg hover:bg-[#eff2f2] transition-colors duration-300 font-medium">Registro</a>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>
            @endif

            <!-- Main Content -->
            <main class="pt-16">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <!-- Horarios Section -->
                        <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
                            <h1 class="text-3xl font-bold text-gray-800 text-center mb-6">Horarios del Sindicato Simón Bolívar</h1>
                            <p class="text-center text-gray-600 mb-6">Las rutas de los minibuses operan todos los días. El horario regular es: 05:00 - 23:00</p>

                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead>
                                        <tr class="bg-[#6dcbc1] text-white">
                                            <th class="py-3 px-6 text-center">Día</th>
                                            <th class="py-3 px-6 text-center">Horarios de operación</th>
                                            <th class="py-3 px-6 text-center">Frecuencia (min)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(['lun.', 'mar.', 'mié.', 'jue.', 'vie.', 'sáb.', 'dom.'] as $index => $dia)
                                            <tr class="{{ $index % 2 == 0 ? 'bg-gray-50' : 'bg-white' }} hover:bg-gray-100 transition-colors duration-200">
                                                <td class="py-3 px-6 text-center border-b">{{ $dia }}</td>
                                                <td class="py-3 px-6 text-center border-b">05:00 - 23:00</td>
                                                <td class="py-3 px-6 text-center border-b">90</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Tarifas Section -->
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
                                <h2 class="text-3xl font-bold text-gray-800 text-center mb-6">Tarifas de Transporte</h2>

                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead>
                                            <tr class="bg-[#6dcbc1]">
                                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider rounded-tl-lg">
                                                    Tipo de Transporte
                                                </th>
                                                <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-white uppercase tracking-wider">
                                                    Tramo Corto (Bs)
                                                </th>
                                                <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-white uppercase tracking-wider">
                                                    Tramo Largo (Bs)
                                                </th>
                                                <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-white uppercase tracking-wider">
                                                    Tramo Extra Largo (Bs)
                                                </th>
                                                <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-white uppercase tracking-wider">
                                                    Tarifa Nocturna (Bs)
                                                </th>
                                                <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-white uppercase tracking-wider rounded-tr-lg">
                                                    Tarifa Diferenciada
                                                    <span class="block text-[11px] font-normal normal-case">
                                                        (Adultos Mayores, Discapacitados, Estudiantes)
                                                    </span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <!-- Minibús -->
                                            <tr class="hover:bg-[#d7f2ef] transition-all duration-300">
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="text-sm font-bold text-gray-900">Minibús</div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-700">
                                                    2,40
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-700">
                                                    3,00
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-700">
                                                    -
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-700">
                                                    <span class="block">2,50 (corto)</span>
                                                    <span class="block">3,20 (largo)</span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-700">
                                                    <span class="block">2,00 (corto)</span>
                                                    <span class="block">2,60 (largo)</span>
                                                </td>
                                            </tr>

                                            <!-- Micros -->
                                            <tr class="hover:bg-[#d7f2ef] transition-all duration-300">
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="text-sm font-bold text-gray-900">Micros</div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-700">
                                                    1,80
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-700">
                                                    2,00
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-700">
                                                    -
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-700">
                                                    -
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-700">
                                                    1,00 (ambos tramos)
                                                </td>
                                            </tr>

                                            <!-- Trufis -->
                                            <tr class="hover:bg-[#d7f2ef] transition-all duration-300">
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="text-sm font-bold text-gray-900">Trufis</div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-700">
                                                    2,80
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-700">
                                                    3,30
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-700">
                                                    3,50
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-700">
                                                    -
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-700">
                                                    -
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                                                <!-- Trámites Section -->
                                                <div class="bg-white rounded-lg shadow-lg p-8">
                                                    <h2 class="text-3xl font-bold text-gray-800 text-center mb-8">Trámites para Afiliación</h2>

                                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                                        <!-- Sección 1 -->
                                                        <div class="bg-gray-50 rounded-lg p-6 hover:shadow-lg transition-all duration-300">
                                                            <div class="flex items-center mb-4">
                                                                <span class="bg-[#6dcbc1] text-white rounded-full w-8 h-8 flex items-center justify-center mr-3">1</span>
                                                                <h3 class="text-xl font-semibold text-gray-800">Solicitud de afiliación escrita</h3>
                                                            </div>
                                                            <div class="transition-all duration-300" x-data="{ open: false }">
                                                                <div class="text-gray-600" :class="{ 'h-20 overflow-hidden': !open }">
                                                                    <p>Para iniciar el proceso, debes presentar una <strong>carta formal</strong> dirigida a los dirigentes del sindicato. En esta carta debes manifestar tu interés en formar parte del sindicato como socio afiliado. Es importante que sea un documento claro y respetuoso, donde expreses tu compromiso con las normas y objetivos del sindicato.</p>
                                                                </div>
                                                                <button @click="open = !open" class="mt-4 text-[#6dcbc1] hover:text-[#5ba89f] font-medium">
                                                                    <span x-text="open ? 'Ver menos' : 'Ver más'"></span>
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <!-- Sección 2 -->
                                                        <div class="bg-gray-50 rounded-lg p-6 hover:shadow-lg transition-all duration-300">
                                                            <div class="flex items-center mb-4">
                                                                <span class="bg-[#6dcbc1] text-white rounded-full w-8 h-8 flex items-center justify-center mr-3">2</span>
                                                                <h3 class="text-xl font-semibold text-gray-800">Documentos personales</h3>
                                                            </div>
                                                            <div class="transition-all duration-300" x-data="{ open: false }">
                                                                <div class="text-gray-600" :class="{ 'h-20 overflow-hidden': !open }">
                                                                    <p>Documentos requeridos:</p>
                                                                    <ul class="list-disc ml-6 mt-2">
                                                                        <li><strong>Carnet de Identidad vigente</strong></li>
                                                                        <li><strong>Fotografía tipo carnet (4x4)</strong></li>
                                                                    </ul>
                                                                </div>
                                                                <button @click="open = !open" class="mt-4 text-[#6dcbc1] hover:text-[#5ba89f] font-medium">
                                                                    <span x-text="open ? 'Ver menos' : 'Ver más'"></span>
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <!-- Sección 3 -->
                                                        <div class="bg-gray-50 rounded-lg p-6 hover:shadow-lg transition-all duration-300">
                                                            <div class="flex items-center mb-4">
                                                                <span class="bg-[#6dcbc1] text-white rounded-full w-8 h-8 flex items-center justify-center mr-3">3</span>
                                                                <h3 class="text-xl font-semibold text-gray-800">Documentación del vehículo</h3>
                                                            </div>
                                                            <div class="transition-all duration-300" x-data="{ open: false }">
                                                                <div class="text-gray-600" :class="{ 'h-20 overflow-hidden': !open }">
                                                                    <ul class="list-disc ml-6">
                                                                        <li><strong>Tarjeta de Propiedad del vehículo</strong></li>
                                                                        <li><strong>SOAT vigente</strong></li>
                                                                        <li><strong>Permiso de Operación</strong></li>
                                                                        <li><strong>Certificado de Inspección Técnica</strong></li>
                                                                        <li><strong>Licencia de Conducir profesional</strong></li>
                                                                    </ul>
                                                                </div>
                                                                <button @click="open = !open" class="mt-4 text-[#6dcbc1] hover:text-[#5ba89f] font-medium">
                                                                    <span x-text="open ? 'Ver menos' : 'Ver más'"></span>
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <!-- Sección 4 -->
                                                        <div class="bg-gray-50 rounded-lg p-6 hover:shadow-lg transition-all duration-300">
                                                            <div class="flex items-center mb-4">
                                                                <span class="bg-[#6dcbc1] text-white rounded-full w-8 h-8 flex items-center justify-center mr-3">4</span>
                                                                <h3 class="text-xl font-semibold text-gray-800">Requisitos adicionales</h3>
                                                            </div>
                                                            <div class="transition-all duration-300" x-data="{ open: false }">
                                                                <div class="text-gray-600" :class="{ 'h-20 overflow-hidden': !open }">
                                                                    <ul class="list-disc ml-6">
                                                                        <li><strong>Pago de inscripción</strong></li>
                                                                        <li><strong>Aval o recomendación</strong></li>
                                                                        <li><strong>Verificación y entrevista</strong></li>
                                                                        <li><strong>Firma del reglamento interno</strong></li>
                                                                    </ul>
                                                                </div>
                                                                <button @click="open = !open" class="mt-4 text-[#6dcbc1] hover:text-[#5ba89f] font-medium">
                                                                    <span x-text="open ? 'Ver menos' : 'Ver más'"></span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </main>

                                    <!-- Footer -->
                                    <footer class="bg-[#1e1e1f] text-white py-12 mt-12">
                                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                                            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                                                <!-- Enlaces útiles -->
                                                <div>
                                                    <h3 class="text-xl font-bold mb-4 text-[#6acbc3]">Enlaces útiles</h3>
                                                    <ul class="space-y-2">
                                                        <li><a href="#" class="text-[#8c9494] hover:text-[#6acbc3] transition-colors duration-300">Inicio</a></li>
                                                        <li><a href="{{ url('/services') }}" class="text-[#8c9494] hover:text-[#6acbc3] transition-colors duration-300">Servicios</a></li>
                                                        <li><a href="{{ url('/rutas') }}" class="text-[#8c9494] hover:text-[#6acbc3] transition-colors duration-300">Rutas</a></li>
                                                        <li><a href="{{ url('/quienes-somos') }}" class="text-[#8c9494] hover:text-[#6acbc3] transition-colors duration-300">¿Quiénes Somos?</a></li>

                                                    </ul>
                                                </div>

                                                <!-- Redes Sociales -->
                                                <div>
                                                    <h3 class="text-xl font-bold mb-4 text-[#6acbc3]">Síguenos en</h3>
                                                    <ul class="space-y-2">
                                                        <li><a href="#" class="text-[#8c9494] hover:text-[#6acbc3] transition-colors duration-300">Facebook</a></li>
                                                        <li><a href="#" class="text-[#8c9494] hover:text-[#6acbc3] transition-colors duration-300">Twitter</a></li>
                                                        <li><a href="#" class="text-[#8c9494] hover:text-[#6acbc3] transition-colors duration-300">Instagram</a></li>
                                                    </ul>
                                                </div>

                                                <!-- Contacto -->
                                                <div>
                                                    <h3 class="text-xl font-bold mb-4 text-[#6acbc3]">Contáctanos</h3>
                                                    <p class="text-[#8c9494] mb-2">Correo electrónico: ViajeSegur0@gmail.com</p>
                                                    <p class="text-[#8c9494]">Teléfono: +59163116078</p>
                                                </div>
                                            </div>

                                            <div class="mt-8 pt-8 border-t border-[#5d5c64] text-center text-[#8c9494]">
                                                <p>&copy; {{ date('Y') }} Sindicato de Transporte. Todos los derechos reservados.</p>
                                            </div>
                                        </div>
                                    </footer>
                                </div>

                                @livewireScripts
                                <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
                            </body>
                        </html>