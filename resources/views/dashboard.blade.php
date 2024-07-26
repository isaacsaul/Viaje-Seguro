
<x-app-layout>

    <div class="py-2">
        <div class="max-w-7xl mx-auto ">
            <div class="flex">
                <!-- Menú a la izquierda -->
                <div class="w-1/5" style="background-color: #f3f4f6; ">
                    <!-- Menú -->
                    <nav style="background-color: #e5e7eb; padding: 1rem; border-radius: 0.5rem;">
                        <ul style="list-style-type: none; padding: 0;">

                            <li style="margin-bottom: 0.5rem;background-color:rgb(255, 255, 255);padding: 8px; border-radius: 5px;cursor: pointer;" onclick="showContent('1')">
                                <a href="#" data-target="1" style="color: #4b5563; text-decoration: none; font-size: 1.2rem;">
                                    <div style="display: flex; align-items: center;">
                                        <img src="https://cdn-icons-gif.flaticon.com/6454/6454239.gif" alt="cubo 3d animated icon" title="cubo 3d animated icon" width="44" height="54">
                                        <span style="margin-left: 8px;">Noticias</span>
                                    </div>
                                </a>
                            </li>

                            <li style="margin-bottom: 0.5rem;background-color:rgb(255, 255, 255);padding: 8px;border-radius: 5px;cursor: pointer;" onclick="showContent('2')">
                                <a href="#" data-target="2" style="color: #4b5563; text-decoration: none; font-size: 1.2rem;">
                                    <div style="display: flex; align-items: center;">
                                        <img src="https://cdn-icons-gif.flaticon.com/6172/6172532.gif" loading="lazy" alt="Redes sociales animated icon" title="Redes sociales animated icon" width="44" height="54" class="pd-none">
                                        <span style="margin-left: 8px;">Tipo de Socio</span>
                                    </div>
                                </a>
                            </li>
                            <!-- Agrega más opciones según sea necesario -->
                            <li style="margin-bottom: 0.5rem;background-color:rgb(255, 255, 255);padding: 8px;border-radius: 5px;cursor: pointer;" onclick="showContent('3')">
                                <a href="#" data-target="3" style="color: #4b5563; text-decoration: none; font-size: 1.2rem;">
                                    <div style="display: flex; align-items: center;">
                                        <img src="https://cdn-icons-gif.flaticon.com/7211/7211817.gif" loading="lazy" alt="cliente animated icon" title="cliente animated icon" width="44" height="54" class="pd-none">
                                        <span style="margin-left: 8px;">Grupos</span>
                                    </div>
                                </a>
                            </li>

                            <li style="margin-bottom: 0.5rem;background-color:rgb(253, 253, 253);padding: 8px;border-radius: 5px;cursor: pointer;" onclick="showContent('4')">
                                <a href="#" data-target="4" style="color: #4b5563; text-decoration: none; font-size: 1.2rem;">
                                    <div style="display: flex; align-items: center;">
                                        <img src="https://cdn-icons-gif.flaticon.com/6844/6844383.gif" loading="lazy" alt="flecha correcta animated icon" title="flecha correcta animated icon"  width="44" height="54" class="pd-none">
                                        <span style="margin-left: 8px;">Lineas</span>
                                    </div>
                                </a>
                            </li>

                            <li style="margin-bottom: 0.5rem;background-color:rgb(255, 255, 255);padding: 8px;border-radius: 5px;cursor: pointer;" onclick="showContent('5')">
                                <a href="#" data-target="5" style="color: #4b5563; text-decoration: none; font-size: 1.2rem;">
                                    <div style="display: flex; align-items: center;">
                                        <img src="https://cdn-icons-gif.flaticon.com/6416/6416387.gif" loading="lazy" alt="Camión animated icon" title="Camión animated icon" width="44" height="54" class="pd-none">
                                        <span style="margin-left: 8px;">Movilidades</span>
                                    </div>
                                </a>
                            </li>


                            <li style="margin-bottom: 0.5rem;background-color:rgb(255, 255, 255);padding: 8px;border-radius: 5px;cursor: pointer;" onclick="showContent('6')">
                                <a href="#" data-target="6" style="color: #4b5563; text-decoration: none; font-size: 1.2rem;">
                                    <div style="display: flex; align-items: center;">
                                        <img src="https://cdn-icons-gif.flaticon.com/6569/6569161.gif" loading="lazy" alt="usuario animated icon" title="usuario animated icon" width="44" height="54" class="pd-none">
                                        <span style="margin-left: 8px;">Choferes</span>
                                    </div>
                                </a>
                            </li>

                            <li style="margin-bottom: 0.5rem;background-color:rgb(255, 255, 255);padding: 8px;border-radius: 5px;cursor: pointer;" onclick="showContent('7')">
                                <a href="#" data-target="7" style="color: #4b5563; text-decoration: none; font-size: 1.2rem;">
                                    <div style="display: flex; align-items: center;">
                                        <img src="https://cdn-icons-gif.flaticon.com/6416/6416398.gif" loading="lazy" alt="Lista de verificación animated icon" title="Lista de verificación animated icon" width="44" height="54" class="pd-none">
                                        <span style="margin-left: 8px;">Sanciones</span>
                                    </div>
                                </a>
                            </li>

                            <li style="margin-bottom: 0.5rem;background-color:rgb(255, 255, 255);padding: 8px;border-radius: 5px;cursor: pointer;" onclick="showContent('8')">
                                <a href="#" data-target="8" style="color: #4b5563; text-decoration: none; font-size: 1.2rem;">
                                    <div style="display: flex; align-items: center;">
                                        <img src="https://cdn-icons-gif.flaticon.com/6172/6172541.gif" loading="lazy" alt="Cuaderno animated icon" title="Cuaderno animated icon" width="44" height="54" class="pd-none">
                                        <span style="margin-left: 8px;">Infracciones</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <!-- Contenido a la derecha del menú -->
                <div class="w-4/5">
                    <!-- Contenido de la página -->
                    <div id="1" class="content">
                        @livewire('show-noticias')
                    </div>

                    <div id="2" class="content" style="display: none;">
                        @livewire('show-tiposocio')
                    </div>

                    <div id="3" class="content" style="display: none;">
                        @livewire('show-grupos')
                    </div>

                    <div id="4" class="content" style="display: none;">
                        @livewire('show-lineas')
                    </div>



                    <div id="5" class="content" style="display: none;">
                        @livewire('show-movilidades')
                    </div>

                    <div id="6" class="content" style="display: none;">
                        @livewire('show-choferes')
                    </div>

                    <div id="7" class="content" style="display: none;">
                        @livewire('show-sanciones')
                    </div>

                    <div id="8" class="content" style="display: none;">
                        @livewire('show-infracciones')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Función para ocultar todos los divs de contenido excepto el seleccionado
        function showContent(target) {
            // Ocultar todos los divs de contenido
            const contents = document.querySelectorAll('.content');
            contents.forEach(content => {
                content.style.display = 'none';
            });

            // Mostrar el div de contenido correspondiente al target
            const selectedContent = document.getElementById(target);
            if (selectedContent) {
                selectedContent.style.display = 'block';
            }
        }

        // Obtén los enlaces del segundo menú
         const links = document.querySelectorAll('nav ul li a');

        // Agrega el evento de clic a cada enlace del segundo menú
        links.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const target = this.getAttribute('data-target');
                if (target) {
                    showContent(target);
                }
            });
        });

        // Mostrar el contenido inicial (Noticias)
        showContent('1');

    </script>

</x-app-layout>

