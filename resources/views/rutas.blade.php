<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Rutas - Sindicato de Transporte</title>

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
    <body class="font-sans antialiased bg-[#eff2f2]">
        <div class="min-h-screen">
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
            <main class="pt-20">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <!-- Header Section -->
                        <div class="bg-white rounded-lg shadow-md p-8 mb-8 transform hover:shadow-xl transition-all duration-300 border border-[#a4b0af]/20">
                            <h2 class="text-3xl font-bold text-[#1e1e1f] mb-4 text-center">
                                Visualización de Rutas de Líneas en Google Maps
                            </h2>
                            <p class="text-lg text-[#777779] text-center max-w-3xl mx-auto">
                                Cada línea está representada por puntos que marcan las paradas principales a lo largo de la ruta,
                                permitiendo a los usuarios visualizar claramente el trayecto de cada línea.
                            </p>
                        </div>

                        <!-- Map Component -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden border border-[#a4b0af]/20">
                            @livewire('show-reportes')
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
    </body>
</html>