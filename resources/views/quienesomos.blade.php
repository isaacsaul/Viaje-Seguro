<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Quiénes Somos - Sindicato de Transporte</title>

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

            <!-- Page Content -->
            <main class="pt-16">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <!-- Hero Section -->
                        <div class="bg-gradient-to-r from-[#6dcbc1] to-[#4fa69d] overflow-hidden shadow-xl sm:rounded-lg mb-8">
                            <div class="p-8 lg:p-12 flex flex-col md:flex-row items-center justify-between">
                                <div class="md:w-2/3">
                                    <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Quiénes Somos</h1>
                                    <p class="text-lg text-white/90 leading-relaxed">
                                        El sindicato de transporte mixto "Simón Bolívar" es una institución con más de 35 años
                                        sirviendo a la comunidad y defendiendo los derechos de nuestros trabajadores.
                                    </p>
                                </div>
                                <div class="md:w-1/3 flex justify-center mt-6 md:mt-0">
                                    <img src="{{ asset('img/login.png') }}" alt="Logo Sindicato" class="w-40 h-40 object-contain">
                                </div>
                            </div>
                        </div>

                        <!-- Estadísticas -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                            <div class="bg-white rounded-lg shadow-lg p-6 transform hover:-translate-y-1 transition-all duration-300">
                                <div class="flex items-center justify-center mb-4">
                                    <span class="p-3 bg-[#6dcbc1]/10 rounded-full">
                                        <svg class="w-8 h-8 text-[#6dcbc1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                    </span>
                                </div>
                                <h3 class="text-xl font-bold text-center text-gray-800 mb-2">+2500</h3>
                                <p class="text-center text-gray-600">Socios Afiliados</p>
                            </div>

                            <div class="bg-white rounded-lg shadow-lg p-6 transform hover:-translate-y-1 transition-all duration-300">
                                <div class="flex items-center justify-center mb-4">
                                    <span class="p-3 bg-[#6dcbc1]/10 rounded-full">
                                        <svg class="w-8 h-8 text-[#6dcbc1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </span>
                                </div>
                                <h3 class="text-xl font-bold text-center text-gray-800 mb-2">35+ Años</h3>
                                <p class="text-center text-gray-600">de Experiencia</p>
                            </div>

                            <div class="bg-white rounded-lg shadow-lg p-6 transform hover:-translate-y-1 transition-all duration-300">
                                <div class="flex items-center justify-center mb-4">
                                    <span class="p-3 bg-[#6dcbc1]/10 rounded-full">
                                        <svg class="w-8 h-8 text-[#6dcbc1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                        </svg>
                                    </span>
                                </div>
                                <h3 class="text-xl font-bold text-center text-gray-800 mb-2">7</h3>
                                <p class="text-center text-gray-600">Administrativos</p>
                            </div>
                        </div>
                        <!-- Sección del Organigrama -->
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                            <div class="bg-white overflow-hidden shadow-xl rounded-lg">
                                <div class="p-6">
                                    <!-- Título de la sección -->
                                    <div class="flex items-center mb-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#6dcbc1] mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                        </svg>
                                        <h2 class="text-3xl font-bold text-gray-800">Organigrama Institucional</h2>
                                    </div>

                                    <!-- Descripción -->
                                    <p class="text-gray-600 mb-6">
                                        Estructura organizacional de nuestro sindicato, mostrando los diferentes niveles jerárquicos y áreas de responsabilidad.
                                    </p>

                                    <!-- Contenedor de la imagen con tamaño máximo -->
                                    <div class="relative rounded-lg overflow-hidden shadow-lg border-4 border-[#6dcbc1] hover:border-[#4b8a81] transition-colors duration-300 max-w-3xl mx-auto">
                                        <!-- Imagen del organigrama -->
                                        <img
                                            src="{{ asset('img/organigrama.png') }}"
                                            alt="Organigrama del Sindicato"
                                            class="w-full h-auto object-contain max-h-[500px]"
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Historia -->
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-8">
                            <div class="p-6 lg:p-8">
                                <div class="flex items-center mb-6">
                                    <span class="p-3 bg-[#6dcbc1]/10 rounded-full mr-4">
                                        <svg class="w-6 h-6 text-[#6dcbc1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                        </svg>
                                    </span>
                                    <h2 class="text-3xl font-bold text-gray-800">Nuestra Historia</h2>
                                </div>
                                <div class="prose max-w-none text-gray-600">
                                    <div class="flex flex-col md:flex-row gap-8">
                                        <div class="md:w-1/2">
                                            <div class="bg-gray-50 rounded-lg p-6 mb-4">
                                                <h3 class="text-xl font-semibold text-gray-800 mb-3">Fundación</h3>
                                                <p>Fundado el 04 de agosto de 1972 en La Paz, iniciando con 66 Propietarios bajo el liderazgo de Mario Siñani Q. y René Alcón.</p>
                                            </div>
                                            <div class="bg-gray-50 rounded-lg p-6">
                                                <h3 class="text-xl font-semibold text-gray-800 mb-3">Identidad</h3>
                                                <p>Colores institucionales: celeste y blanco</p>
                                                <p>Base de operaciones: línea 12 Ramales y Viacha</p>
                                            </div>
                                        </div>
                                        <div class="md:w-1/2 bg-gray-50 rounded-lg p-6">
                                            <h3 class="text-xl font-semibold text-gray-800 mb-3">Hitos Importantes</h3>
                                            <ul class="space-y-3">
                                                <li class="flex items-start">
                                                    <svg class="w-5 h-5 text-[#6dcbc1] mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                    </svg>
                                                    <span>Asamblea histórica en el Teatro Mundial (1969)</span>
                                                </li>
                                                <li class="flex items-start">
                                                    <svg class="w-5 h-5 text-[#6dcbc1] mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                    </svg>
                                                    <span>Independencia del Sindicato "Eduardo Avaroa"</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Objetivos y Fines -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                                <div class="p-6">
                                    <div class="flex items-center mb-6">
                                        <span class="p-3 bg-[#6dcbc1]/10 rounded-full mr-4">
                                            <svg class="w-6 h-6 text-[#6dcbc1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                            </svg>
                                        </span>
                                        <h2 class="text-2xl font-bold text-gray-800">Nuestros Objetivos</h2>
                                    </div>
                                    <ul class="space-y-4">
                                        <!-- Objetivo 1 -->
                                        <li class="flex items-start group">
                                            <span class="p-2 bg-[#6dcbc1]/10 rounded-full mr-3 group-hover:bg-[#6dcbc1]/20 transition-colors duration-300">
                                                <svg class="w-5 h-5 text-[#6dcbc1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 group-hover:text-gray-900 transition-colors duration-300">
                                                Lograr el establecimiento de la acción sindical efectiva entre sus asociados, no permitiendo operar vehículos en ninguna de las modalidades establecidas por Ia institución, sin antes estar afiliados en el sindicato.
                                            </span>
                                        </li>

                                        <!-- Objetivo 2 -->
                                        <li class="flex items-start group">
                                            <span class="p-2 bg-[#6dcbc1]/10 rounded-full mr-3 group-hover:bg-[#6dcbc1]/20 transition-colors duration-300">
                                                <svg class="w-5 h-5 text-[#6dcbc1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 group-hover:text-gray-900 transition-colors duration-300">
                                                Implantar a través de los directorios de turno, la capacitación intelectual, técnica y profesional de todos los socios afiliados al SMTSB mediante seminarios, charlas, etc.
                                            </span>
                                        </li>

                                        <!-- Objetivo 3 -->
                                        <li class="flex items-start group">
                                            <span class="p-2 bg-[#6dcbc1]/10 rounded-full mr-3 group-hover:bg-[#6dcbc1]/20 transition-colors duration-300">
                                                <svg class="w-5 h-5 text-[#6dcbc1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 group-hover:text-gray-900 transition-colors duration-300">
                                                Mantener adecuadas relaciones con todas las organizaciones similares como ser: sindicatos, económicas financieras cívicas, sociales, culturales y deportivas.
                                            </span>
                                        </li>

                                        <!-- Objetivo 4 -->
                                        <li class="flex items-start group">
                                            <span class="p-2 bg-[#6dcbc1]/10 rounded-full mr-3 group-hover:bg-[#6dcbc1]/20 transition-colors duration-300">
                                                <svg class="w-5 h-5 text-[#6dcbc1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 group-hover:text-gray-900 transition-colors duration-300">
                                                En caso de extrema necesidad cuando fuesen amenazados los derechos o intereses del SMTSB a nivel económico, político o social, recurrir a organismos nacionales o internacionales que jurídicamente puedan emplear su capacidad de ayuda y colaboración como organización sindical.
                                            </span>
                                        </li>

                                        <!-- Objetivo 5 -->
                                        <li class="flex items-start group">
                                            <span class="p-2 bg-[#6dcbc1]/10 rounded-full mr-3 group-hover:bg-[#6dcbc1]/20 transition-colors duration-300">
                                                <svg class="w-5 h-5 text-[#6dcbc1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 group-hover:text-gray-900 transition-colors duration-300">
                                                Precautelar todos los bienes habidos y por haber tanto económicos y patrimoniales, como ser la sede social, el complejo deportivo, etc.
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                                <div class="p-6">
                                    <div class="flex items-center mb-6">
                                        <span class="p-3 bg-[#6dcbc1]/10 rounded-full mr-4">
                                            <svg class="w-6 h-6 text-[#6dcbc1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2v16z"></path>
                                            </svg>
                                        </span>
                                        <h2 class="text-2xl font-bold text-gray-800">Nuestros Fines</h2>
                                    </div>
                                    <ul class="space-y-4">
                                        <!-- Fin 1 -->
                                        <li class="flex items-start group">
                                            <span class="p-2 bg-[#6dcbc1]/10 rounded-full mr-3 group-hover:bg-[#6dcbc1]/20 transition-colors duration-300">
                                                <svg class="w-5 h-5 text-[#6dcbc1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 group-hover:text-gray-900 transition-colors duration-300">
                                                Mantener la unidad sindical de todos los socios contra cualquier intento de división que atente en contra de la institución.
                                            </span>
                                        </li>

                                        <!-- Fin 2 -->
                                        <li class="flex items-start group">
                                            <span class="p-2 bg-[#6dcbc1]/10 rounded-full mr-3 group-hover:bg-[#6dcbc1]/20 transition-colors duration-300">
                                                <svg class="w-5 h-5 text-[#6dcbc1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 group-hover:text-gray-900 transition-colors duration-300">
                                                La buena organización en cuanto a los servicios de transporte de pasajeros que corresponda a las áreas de trabajo del SMTSB, cuidando la regularidad, continuidad y seguridad acorde a los servicios prestados.
                                            </span>
                                        </li>

                                        <!-- Fin 3 -->
                                        <li class="flex items-start group">
                                            <span class="p-2 bg-[#6dcbc1]/10 rounded-full mr-3 group-hover:bg-[#6dcbc1]/20 transition-colors duration-300">
                                                <svg class="w-5 h-5 text-[#6dcbc1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 group-hover:text-gray-900 transition-colors duration-300">
                                                Luchar por las tarifas justas que compensen las horas de trabajo, el capital invertido y los servicios prestados.
                                            </span>
                                        </li>

                                        <!-- Fin 4 -->
                                        <li class="flex items-start group">
                                            <span class="p-2 bg-[#6dcbc1]/10 rounded-full mr-3 group-hover:bg-[#6dcbc1]/20 transition-colors duration-300">
                                                <svg class="w-5 h-5 text-[#6dcbc1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 group-hover:text-gray-900 transition-colors duration-300">
                                                Mantener la unidad permanente de los afiliados a nuestra institución, incentivando a la capacitación y el deporte con la finalidad de conseguir mejores condiciones de vida.
                                            </span>
                                        </li>

                                        <!-- Fin 5 -->
                                        <li class="flex items-start group">
                                            <span class="p-2 bg-[#6dcbc1]/10 rounded-full mr-3 group-hover:bg-[#6dcbc1]/20 transition-colors duration-300">
                                                <svg class="w-5 h-5 text-[#6dcbc1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 group-hover:text-gray-900 transition-colors duration-300">
                                                Fortalecer y mantener el consultorio de atención médica básica, ampliando el beneficio a un seguro general más amplio.
                                            </span>
                                        </li>

                                        <!-- Fin 6 -->
                                        <li class="flex items-start group">
                                            <span class="p-2 bg-[#6dcbc1]/10 rounded-full mr-3 group-hover:bg-[#6dcbc1]/20 transition-colors duration-300">
                                                <svg class="w-5 h-5 text-[#6dcbc1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 group-hover:text-gray-900 transition-colors duration-300">
                                                Realizar los movimientos económicos y financieros posibles a fin de alcanzar el bien común, para establecer formas de recapitalización de Ia economía del socio propietario y la liberación económica del socio asalariado.
                                            </span>
                                        </li>
                                    </ul>
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
                                <li><a href="{{ url('/quienes-somos') }}"
                                    class="text-[#8c9494] hover:text-[#6acbc3] transition-colors duration-300">¿Quiénes Somos?</a>
                            </li>
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