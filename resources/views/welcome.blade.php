<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sindicato de Transporte Público Simón Bolívar</title>

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
                                <img src="{{ asset('img/login.png') }}" alt="Logo Sindicato" class="w-[60px] h-auto">
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:flex sm:ml-10 sm:items-center">
                                <a href="{{ url('/') }}"
                                    class="text-white hover:text-[#eff2f2] transition-colors duration-300 font-medium">
                                    Home
                                </a>
                                <a href="{{ url('/services') }}"
                                    class="text-white hover:text-[#eff2f2] transition-colors duration-300 font-medium">
                                    Servicios
                                </a>
                                <a href="{{ url('/rutas') }}"
                                    class="text-white hover:text-[#eff2f2] transition-colors duration-300 font-medium">
                                    Rutas
                                </a>
                                <a href="{{ url('/quienes-somos') }}"
                                    class="text-white hover:text-[#eff2f2] transition-colors duration-300 font-medium">
                                    ¿Quiénes Somos?
                                </a>
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                    class="text-white hover:text-[#eff2f2] transition-colors duration-300 font-medium">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="text-white hover:text-[#eff2f2] transition-colors duration-300 font-medium mr-4">Iniciar
                                    sesión</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="bg-white text-[#28b0a3] px-4 py-2 rounded-lg hover:bg-[#eff2f2] transition-colors duration-300 font-medium">Registro</a>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>
        @endif

        <!-- Hero Section -->
        <main class="pt-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="py-12">
                    <!-- Hero Content -->
                    <div class="text-left mb-16">
                        <h1 class="text-6xl font-bold text-gray-900 mb-4">
                            Sindicato de Transporte Público Simón Bolívar
                        </h1>
                        <p class="text-2xl text-gray-600 mb-8">
                            Defendiendo los derechos de los trabajadores del transporte público
                        </p>
                        <a href="https://wa.me/59163116078?text=Hola,%20me%20interesa%20afiliarme%20al%20Sindicato%20de%20Transporte"
                            target="_blank" rel="noopener noreferrer" class="inline-block">
                            <button
                                class="bg-[#6dcbc1] text-gray-800 px-8 py-4 text-xl rounded-lg font-semibold hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300 flex items-center">
                                <span>Afíliate Ahora</span>
                                <svg class="w-6 h-6 ml-2" fill="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                </svg>
                            </button>
                        </a>
                    </div>



                    <!-- Stats Section -->
                    <div class="bg-white rounded-3xl shadow-xl p-8 mb-16">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <div
                                class="text-center p-6 hover:transform hover:-translate-y-2 transition-all duration-300">
                                <dt class="text-xl text-gray-600 font-bold mb-2">Líneas en Servicio</dt>
                                <dd class="text-5xl font-bold text-gray-800 mb-2">14 Líneas</dd>
                                <p class="text-gray-600">Actualmente operativas en diferentes zonas</p>
                            </div>
                            <div
                                class="text-center p-6 hover:transform hover:-translate-y-2 transition-all duration-300">
                                <dt class="text-xl text-gray-600 font-bold mb-2">Rutas Disponibles</dt>
                                <dd class="text-5xl font-bold text-gray-800 mb-2">5 Rutas</dd>
                                <p class="text-gray-600">Cubren sectores clave de la ciudad</p>
                            </div>
                            <div
                                class="text-center p-6 hover:transform hover:-translate-y-2 transition-all duration-300">
                                <dt class="text-xl text-gray-600 font-bold mb-2">Movilidades en Servicio</dt>
                                <dd class="text-5xl font-bold text-gray-800 mb-2">356 Movilidades</dd>
                                <p class="text-gray-600">Entre micros y minibuses activos</p>
                            </div>
                        </div>
                    </div>

                    @if ($noticias->count())
                        <div class="mt-8 bg-white rounded-xl shadow-md p-6 overflow-hidden">
                            <!-- Encabezado -->
                            <div class="mb-4">
                                <h3 class="text-3xl font-extrabold text-[#1e1e1f] tracking-tight">Últimas Noticias del
                                    Sindicato</h3>
                                <p class="text-[#4b5563] mt-1 text-base">
                                    Mantente informado con los comunicados más recientes, anuncios importantes y
                                    novedades del Sindicato de Transporte Público "Simón Bolívar".
                                </p>
                            </div>

                            <!-- Carrusel de imágenes -->
                            <div
                                class="flex gap-6 overflow-x-auto pb-4 scrollbar-thin scrollbar-thumb-[#28b0a3] scrollbar-track-[#eff2f2]">
                                @foreach ($noticias as $noticia)
                                    @if ($noticia->imagen)
                                        <div
                                            class="group relative flex-none w-[460px] h-[460px] rounded-xl shadow-lg overflow-hidden bg-[#eff2f2] flex items-center justify-center transition-transform duration-300 hover:scale-105">
                                            <img src="{{ asset('storage/' . $noticia->imagen) }}"
                                                alt="{{ $noticia->titulo }}"
                                                class="max-w-full max-h-full object-contain transition-shadow duration-300 group-hover:shadow-2xl" />

                                            <div
                                                class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                                <h4 class="text-white text-lg font-semibold">{{ $noticia->titulo }}
                                                </h4>
                                                <p class="text-white text-sm mt-1">
                                                    <i class="far fa-calendar-alt mr-1"></i>
                                                    {{ \Carbon\Carbon::parse($noticia->created_at)->translatedFormat('d \d\e F \d\e Y') }}
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif



                    <!-- Sección del Carrusel con Encabezado -->
                    <section class="bg-white py-10 px-4 sm:px-6 lg:px-8">
                        <div class="max-w-4xl mx-auto text-center mb-8">
                            <h2 class="text-3xl font-bold text-[#1e1e1f] mb-2">Galería del Sindicato</h2>
                            <p class="text-[#555] text-base sm:text-lg">Revive los mejores momentos y eventos del Sindicato de Transporte Público Simón Bolívar. Aquí compartimos parte de nuestra historia y actividades en imágenes.</p>
                        </div>

                        <!-- Image Carousel -->
                        <div x-data="{
                            active: 0,
                            images: [
                                '{{ asset('img/imag12.jpg') }}',
                                '{{ asset('img/imag13.jpg') }}',
                                '{{ asset('img/imag14.jpg') }}',
                                '{{ asset('img/imag15.jpeg') }}',
                                '{{ asset('img/imag18.jpeg') }}',
                                '{{ asset('img/imag19.jpeg') }}',
                                '{{ asset('img/imag17.jpeg') }}'
                            ],
                            init() {
                                setInterval(() => {
                                    this.active = (this.active + 1) % this.images.length;
                                }, 3000);
                            }
                        }" x-init="init" class="relative max-w-3xl mx-auto">
                            <!-- Imagen -->
                            <div class="overflow-hidden rounded-xl shadow-md bg-gray-100 flex justify-center items-center h-80 sm:h-[24rem]">
                                <template x-for="(image, index) in images" :key="index">
                                    <img x-show="active === index" :src="image"
                                        class="object-contain max-h-full max-w-full transition-opacity duration-700"
                                        x-transition:enter="transition ease-out duration-300"
                                        x-transition:enter-start="opacity-0"
                                        x-transition:enter-end="opacity-100"
                                        x-transition:leave="transition ease-in duration-300"
                                        x-transition:leave-start="opacity-100"
                                        x-transition:leave-end="opacity-0"
                                        :alt="'Imagen ' + (index + 1)" />
                                </template>
                            </div>

                            <!-- Botón anterior -->
                            <button @click="active = (active === 0) ? images.length - 1 : active - 1"
                                class="absolute top-1/2 left-2 transform -translate-y-1/2 bg-white bg-opacity-80 hover:bg-opacity-100 px-3 py-2 rounded-full shadow transition-all duration-200 hover:scale-110"
                                aria-label="Imagen anterior">
                                <span class="text-xl font-bold text-gray-700">‹</span>
                            </button>

                            <!-- Botón siguiente -->
                            <button @click="active = (active === images.length - 1) ? 0 : active + 1"
                                class="absolute top-1/2 right-2 transform -translate-y-1/2 bg-white bg-opacity-80 hover:bg-opacity-100 px-3 py-2 rounded-full shadow transition-all duration-200 hover:scale-110"
                                aria-label="Siguiente imagen">
                                <span class="text-xl font-bold text-gray-700">›</span>
                            </button>

                            <!-- Indicadores -->
                            <div class="flex justify-center mt-4 space-x-2">
                                <template x-for="(image, index) in images" :key="index">
                                    <button class="w-3 h-3 rounded-full transition-colors duration-200"
                                        :class="active === index ? 'bg-[#6dcbc1]' : 'bg-gray-400'"
                                        @click="active = index"
                                        :aria-label="'Ir a imagen ' + (index + 1)">
                                    </button>
                                </template>
                            </div>
                        </div>
                    </section>

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
                            <li><a href="#"
                                    class="text-[#8c9494] hover:text-[#6acbc3] transition-colors duration-300">Inicio</a>
                            </li>
                            <li><a href="{{ url('/services') }}"
                                    class="text-[#8c9494] hover:text-[#6acbc3] transition-colors duration-300">Servicios</a>
                            </li>
                            <li><a href="{{ url('/rutas') }}"
                                    class="text-[#8c9494] hover:text-[#6acbc3] transition-colors duration-300">Rutas</a>
                            </li>
                            <li><a href="{{ url('/quienes-somos') }}"
                                    class="text-[#8c9494] hover:text-[#6acbc3] transition-colors duration-300">¿Quiénes Somos?</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Redes Sociales -->
                    <div>
                        <h3 class="text-xl font-bold mb-4 text-[#6acbc3]">Síguenos en</h3>
                        <ul class="space-y-2">
                            <li><a href="#"
                                    class="text-[#8c9494] hover:text-[#6acbc3] transition-colors duration-300">Facebook</a>
                            </li>
                            <li><a href="#"
                                    class="text-[#8c9494] hover:text-[#6acbc3] transition-colors duration-300">Twitter</a>
                            </li>
                            <li><a href="#"
                                    class="text-[#8c9494] hover:text-[#6acbc3] transition-colors duration-300">Instagram</a>
                            </li>
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
