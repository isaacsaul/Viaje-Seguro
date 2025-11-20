<x-app-layout>
    <div class="min-h-screen bg-gray-100">
        <!-- Botón de menú móvil -->
        <div class="lg:hidden fixed top-4 left-4 z-50">
            <button id="mobile-menu-button" class="p-2 rounded-lg bg-white shadow-lg">
                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <div class="flex">
            <!-- Sidebar -->
            <div id="sidebar" class="fixed left-0 top-20 h-[calc(100vh-5rem)] bg-white shadow-lg transform lg:translate-x-0 transition-transform duration-300 ease-in-out w-64 lg:w-1/5 -translate-x-full z-40">
                <nav class="p-4 space-y-2 h-full overflow-y-auto">
                    <div class="flex justify-end lg:hidden">
                        <button id="close-sidebar" class="p-2 rounded-lg text-gray-600 hover:bg-gray-100">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                    <ul class="space-y-2">
                        @can('admin')
                            <li>
                                <a href="#" data-target="1" class="menu-item group">
                                    <div class="flex items-center p-3 rounded-lg transition-all duration-200 hover:bg-blue-50">
                                        <img src="https://cdn-icons-gif.flaticon.com/6454/6454239.gif" class="w-8 h-8" alt="Noticias">
                                        <span class="ml-3 text-gray-700 group-hover:text-blue-600 font-medium">Noticias</span>
                                    </div>
                                </a>
                            </li>
                        @endcan

                        @can('admin')
                            <li>
                                <a href="#" data-target="2" class="menu-item group">
                                    <div class="flex items-center p-3 rounded-lg transition-all duration-200 hover:bg-blue-50">
                                        <img src="https://cdn-icons-gif.flaticon.com/6172/6172532.gif" class="w-8 h-8" alt="Tipo de Socio">
                                        <span class="ml-3 text-gray-700 group-hover:text-blue-600 font-medium">Tipo de Socio</span>
                                    </div>
                                </a>
                            </li>
                        @endcan

                        @can('admin')
                            <li>
                                <a href="#" data-target="3" class="menu-item group">
                                    <div class="flex items-center p-3 rounded-lg transition-all duration-200 hover:bg-blue-50">
                                        <img src="https://cdn-icons-gif.flaticon.com/7211/7211817.gif" class="w-8 h-8" alt="Grupos">
                                        <span class="ml-3 text-gray-700 group-hover:text-blue-600 font-medium">Grupos</span>
                                    </div>
                                </a>
                            </li>
                        @endcan

                        @can('admin')
                            <li>
                                <a href="#" data-target="4" class="menu-item group">
                                    <div class="flex items-center p-3 rounded-lg transition-all duration-200 hover:bg-blue-50">
                                        <img src="https://cdn-icons-gif.flaticon.com/6844/6844383.gif" class="w-8 h-8" alt="Líneas">
                                        <span class="ml-3 text-gray-700 group-hover:text-blue-600 font-medium">Líneas</span>
                                    </div>
                                </a>
                            </li>
                        @endcan

                        @canany(['admin', 'dpto'])
                            <li>
                                <a href="#" data-target="5" class="menu-item group">
                                    <div class="flex items-center p-3 rounded-lg transition-all duration-200 hover:bg-blue-50">
                                        <img src="https://cdn-icons-gif.flaticon.com/6416/6416387.gif" class="w-8 h-8" alt="Movilidades">
                                        <span class="ml-3 text-gray-700 group-hover:text-blue-600 font-medium">Movilidades</span>
                                    </div>
                                </a>
                            </li>
                        @endcanany

                        @canany(['admin', 'dpto'])
                            <li>
                                <a href="#" data-target="6" class="menu-item group">
                                    <div class="flex items-center p-3 rounded-lg transition-all duration-200 hover:bg-blue-50">
                                        <img src="https://cdn-icons-gif.flaticon.com/6569/6569161.gif" class="w-8 h-8" alt="Choferes">
                                        <span class="ml-3 text-gray-700 group-hover:text-blue-600 font-medium">Choferes</span>
                                    </div>
                                </a>
                            </li>
                        @endcanany

                        @canany(['admin', 'dpto'])
                            <li>
                                <a href="#" data-target="7" class="menu-item group">
                                    <div class="flex items-center p-3 rounded-lg transition-all duration-200 hover:bg-blue-50">
                                        <img src="https://cdn-icons-gif.flaticon.com/6416/6416398.gif" class="w-8 h-8" alt="Sanciones">
                                        <span class="ml-3 text-gray-700 group-hover:text-blue-600 font-medium">Sanciones</span>
                                    </div>
                                </a>
                            </li>
                        @endcanany

                        @canany(['admin', 'dpto'])
                            <li>
                                <a href="#" data-target="8" class="menu-item group">
                                    <div class="flex items-center p-3 rounded-lg transition-all duration-200 hover:bg-blue-50">
                                        <img src="https://cdn-icons-gif.flaticon.com/6172/6172541.gif" class="w-8 h-8" alt="Infracciones">
                                        <span class="ml-3 text-gray-700 group-hover:text-blue-600 font-medium">Infracciones</span>
                                    </div>
                                </a>
                            </li>
                        @endcanany

                        @canany(['admin', 'dpto'])
                            <li>
                                <a href="#" data-target="9" class="menu-item group">
                                    <div class="flex items-center p-3 rounded-lg transition-all duration-200 hover:bg-blue-50">
                                        <img src="https://cdn-icons-gif.flaticon.com/6172/6172541.gif" class="w-8 h-8" alt="Pagos">
                                        <span class="ml-3 text-gray-700 group-hover:text-blue-600 font-medium">Pagos</span>
                                    </div>
                                </a>
                            </li>
                        @endcanany

                        @canany(['admin', 'chofer'])
                            <li>
                                <a href="#" data-target="10" class="menu-item group">
                                    <div class="flex items-center p-3 rounded-lg transition-all duration-200 hover:bg-blue-50">
                                        <img src="https://cdn-icons-gif.flaticon.com/6172/6172541.gif" class="w-8 h-8" alt="Consulta">
                                        <span class="ml-3 text-gray-700 group-hover:text-blue-600 font-medium">Consulta</span>
                                    </div>
                                </a>
                            </li>
                        @endcanany
                    </ul>
                </nav>
            </div>

            <!-- Contenido Principal -->
            <div class="flex-1 lg:ml-[20%] p-4 lg:p-6">
                <div class="max-w-7xl mx-auto">
                    <div id="1" class="content fade-in">
                        @livewire('show-noticias')
                    </div>

                    <div id="2" class="content hidden fade-in">
                        @livewire('show-tiposocio')
                    </div>

                    <div id="3" class="content hidden fade-in">
                        @livewire('show-grupos')
                    </div>

                    <div id="4" class="content hidden fade-in">
                        @livewire('show-lineas')
                    </div>

                    <div id="5" class="content hidden fade-in">
                        @livewire('show-movilidades')
                    </div>

                    <div id="6" class="content hidden fade-in">
                        @livewire('show-choferes')
                    </div>

                    <div id="7" class="content hidden fade-in">
                        @livewire('show-sanciones')
                    </div>

                    <div id="8" class="content hidden fade-in">
                        @livewire('show-infracciones')
                    </div>

                    <div id="9" class="content hidden fade-in">
                        @livewire('show-pagos')
                    </div>

                    <div id="10" class="content hidden fade-in">
                        @livewire('show-usuarios')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Overlay para menú móvil -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black opacity-50 z-30 hidden lg:hidden"></div>

    <style>
        .fade-in {
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .menu-item.active div {
            @apply bg-blue-50;
        }

        .menu-item.active span {
            @apply text-blue-600;
        }

        /* Estilo para el scrollbar del menú */
        .overflow-y-auto::-webkit-scrollbar {
            width: 6px;
            display: block;
        }

        .overflow-y-auto::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .overflow-y-auto::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        .overflow-y-auto::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Estilo para Firefox */
        .overflow-y-auto {
            scrollbar-width: thin;
            scrollbar-color: #cbd5e1 #f1f1f1;
        }

        @media (max-width: 1024px) {
            .content {
                @apply mt-16;
            }
        }
    </style>

    <script>
        function showContent(target) {
            document.querySelectorAll('.content').forEach(content => {
                content.classList.add('hidden');
            });

            document.querySelectorAll('.menu-item').forEach(item => {
                item.classList.remove('active');
            });

            const selectedContent = document.getElementById(target);
            if (selectedContent) {
                selectedContent.classList.remove('hidden');
            }

            const selectedMenuItem = document.querySelector(`[data-target="${target}"]`);
            if (selectedMenuItem) {
                selectedMenuItem.classList.add('active');
            }

            // Cerrar sidebar en móvil después de seleccionar
            if (window.innerWidth < 1024) {
                toggleSidebar(false);
            }
        }

        // Funcionalidad del menú móvil
        function toggleSidebar(show) {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');

            if (show) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }
        }

        // Event Listeners
        document.getElementById('mobile-menu-button').addEventListener('click', () => toggleSidebar(true));
        document.getElementById('close-sidebar').addEventListener('click', () => toggleSidebar(false));
        document.getElementById('sidebar-overlay').addEventListener('click', () => toggleSidebar(false));

        document.querySelectorAll('.menu-item').forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const target = this.getAttribute('data-target');
                if (target) {
                    showContent(target);
                }
            });
        });

        // Manejar cambio de tamaño de ventana
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) {
                toggleSidebar(true);
            } else {
                toggleSidebar(false);
            }
        });

        // Mostrar contenido inicial
        showContent('1');
    </script>
</x-app-layout>