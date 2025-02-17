    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>Laravel</title>

            <!-- Agrega la referencia al favicon -->
           <link rel="icon" type="image/png" href="{{ asset('img/login.png') }}">


            <!-- Fonts -->
            <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

            <!-- Styles -->
            <style>
                /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.text-center{text-align:center}.text-gray-200{--tw-text-opacity: 1;color:rgb(229 231 235 / var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}.dark\:bg-gray-900{--tw-bg-opacity: 1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:border-gray-700{--tw-border-opacity: 1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}}
            </style>

            <style>
                body {
                    font-family: 'Nunito', sans-serif;
                }
            </style>
        </head>
        <body class="antialiased">
            <div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center py-4 sm:pt-0">
                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        <a href="{{ url('/') }}" class="ml-4 text-sm text-gray-700 underline">Home</a>

                        <a href="{{ url('/services') }}" class="ml-4 text-sm text-gray-700 underline">Servicios</a>

                        <a href="{{ url('/consultausuario') }}" class="ml-4 text-sm text-gray-700 underline ">Consulta de Reportes</a>

                        <a href="{{ url('/rutas') }}" class="ml-4 text-sm text-gray-700 underline ">Rutas</a>


                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="ml-4 text-sm text-gray-700 underline">Iniciar Session</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Registro</a>
                            @endif
                        @endauth

                    </div>
                @endif

                <div class="max-w-6xl mx-auto sm:px-2 lg:px-2">



                    <div style="background-color: #ffffff; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); padding: 20px; max-width: 600px; width: 100%; margin: 20px auto; font-family: Arial, sans-serif;margin-top:100px">
                        <h1 style="text-align: center; margin-bottom: 20px; color: #333333;">Horarios del sindicato Simon Bolivar</h1>
                        <p style="text-align: center;">Las rutas de los minibuses opera todos los días. El horario regular es: 05:00 - 23:00</p>
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <thead>
                                <tr>
                                    <th style="padding: 10px; text-align: center; border-bottom: 1px solid #dddddd; background-color: #007bff; color: white;">Día</th>
                                    <th style="padding: 10px; text-align: center; border-bottom: 1px solid #dddddd; background-color: #007bff; color: white;">Horarios de operación</th>
                                    <th style="padding: 10px; text-align: center; border-bottom: 1px solid #dddddd; background-color: #007bff; color: white;">Frecuencia (min)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="background-color: #f2f2f2;">
                                    <td style="padding: 10px; text-align: center; border-bottom: 1px solid #dddddd;">lun.</td>
                                    <td style="padding: 10px; text-align: center; border-bottom: 1px solid #dddddd;">05:00 - 23:00</td>
                                    <td style="padding: 10px; text-align: center; border-bottom: 1px solid #dddddd;">90</td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px; text-align: center; border-bottom: 1px solid #dddddd;">mar.</td>
                                    <td style="padding: 10px; text-align: center; border-bottom: 1px solid #dddddd;">05:00 - 23:00</td>
                                    <td style="padding: 10px; text-align: center; border-bottom: 1px solid #dddddd;">90</td>
                                </tr>
                                <tr style="background-color: #f2f2f2;">
                                    <td style="padding: 10px; text-align: center; border-bottom: 1px solid #dddddd;">mié.</td>
                                    <td style="padding: 10px; text-align: center; border-bottom: 1px solid #dddddd;">05:00 - 23:00</td>
                                    <td style="padding: 10px; text-align: center; border-bottom: 1px solid #dddddd;">90</td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px; text-align: center; border-bottom: 1px solid #dddddd;">jue.</td>
                                    <td style="padding: 10px; text-align: center; border-bottom: 1px solid #dddddd;">05:00 - 23:00</td>
                                    <td style="padding: 10px; text-align: center; border-bottom: 1px solid #dddddd;">90</td>
                                </tr>
                                <tr style="background-color: #f2f2f2;">
                                    <td style="padding: 10px; text-align: center; border-bottom: 1px solid #dddddd;">vie.</td>
                                    <td style="padding: 10px; text-align: center; border-bottom: 1px solid #dddddd;">05:00 - 23:00</td>
                                    <td style="padding: 10px; text-align: center; border-bottom: 1px solid #dddddd;">90</td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px; text-align: center; border-bottom: 1px solid #dddddd;">sáb.</td>
                                    <td style="padding: 10px; text-align: center; border-bottom: 1px solid #dddddd;">05:00 - 23:00</td>
                                    <td style="padding: 10px; text-align: center; border-bottom: 1px solid #dddddd;">90</td>
                                </tr>
                                <tr style="background-color: #f2f2f2;">
                                    <td style="padding: 10px; text-align: center; border-bottom: 1px solid #dddddd;">dom.</td>
                                    <td style="padding: 10px; text-align: center; border-bottom: 1px solid #dddddd;">05:00 - 23:00</td>
                                    <td style="padding: 10px; text-align: center; border-bottom: 1px solid #dddddd;">90</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                    <div style="background-color: #f8f9fa; padding: 20px; font-family: Arial, sans-serif;">
                        <h2 style="text-align: center; color: #333333;">Trámites por áreas</h2>
                    </div>

                    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                            <div class="grid grid-cols-1 md:grid-cols-2">
                                <div class="p-6">
                                    <div class="flex items-center">
                                        <div class="ml-4 text-lg leading-7 font-semibold"><h1>Servicio de Grúas</h1></div>
                                    </div>
                                    <div class="ml-12">
                                        <div id="section1" class="mt-2 text-gray-600 dark:text-gray-400 text-sm" style="display:none;">
                                            <p>Atendemos remolques por accidente y descompostura.</p>
                                        </div>
                                        <button onclick="toggleSection('section1')" style="cursor: pointer;">Ver más</button>
                                    </div>
                                </div>
                                <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                                    <div class="flex items-center">
                                        <div class="ml-4 text-lg leading-7 font-semibold"><h1>Arrastre de Vehículos</h1></div>
                                    </div>
                                    <div class="ml-12">
                                        <div id="section2" class="mt-2 text-gray-600 dark:text-gray-400 text-sm" style="display:none;">
                                            <p>Arrastre de vehículos al corralón.</p>
                                        </div>
                                        <button onclick="toggleSection('section2')" style="cursor: pointer;">Ver más</button>
                                    </div>
                                </div>
                                <div class="p-6 border-t border-gray-200">
                                    <div class="flex items-center">
                                        <div class="ml-4 text-lg leading-7 font-semibold"><h1>Cambio de Llantas</h1></div>
                                    </div>
                                    <div class="ml-12">
                                        <div id="section3" class="mt-2 text-gray-600 dark:text-gray-400 text-sm" style="display:none;">
                                            <p>Cambio de llantas por ponchadura.</p>
                                        </div>
                                        <button onclick="toggleSection('section3')" style="cursor: pointer;">Ver más</button>
                                    </div>
                                </div>
                                <div class="p-6 border-t border-gray-200 md:border-l">
                                    <div class="flex items-center">
                                        <div class="ml-4 text-lg leading-7 font-semibold"><h1>Combustible</h1></div>
                                    </div>
                                    <div class="ml-12">
                                        <div id="section4" class="mt-2 text-gray-600 dark:text-gray-400 text-sm" style="display:none;">
                                            <p>Entrega de gasolina o diésel a su ubicación.</p>
                                        </div>
                                        <button onclick="toggleSection('section4')" style="cursor: pointer;">Ver más</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>









                </div>



                <!-- Scripts -->
                <script>
                    // Function to toggle sections
                    function toggleSection(sectionId) {
                        var section = document.getElementById(sectionId);
                        if (section.style.display === "none") {
                            section.style.display = "block";
                        } else {
                            section.style.display = "none";
                        }
                    }

                    // Function to scroll to the top of the page
                    var mybutton = document.getElementById("myBtn");
                    window.onscroll = function() {scrollFunction()};

                    function scrollFunction() {
                        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                            mybutton.style.display = "block";
                        } else {
                            mybutton.style.display = "none";
                        }
                    }

                    function topFunction() {
                        document.body.scrollTop = 0;
                        document.documentElement.scrollTop = 0;
                    }
                </script>








        </body>




    </html>
