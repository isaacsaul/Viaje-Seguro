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

                    <a href="{{ url('/services') }}" class="ml-4 text-sm text-gray-700 underline ">Servicios</a>

                    <a href="{{ url('/consultausuario') }}" class="ml-4 text-sm text-gray-700 underline ">Consulta de Reportes</a>


                    <a href="{{ url('/rutas') }}" class="ml-4 text-sm text-gray-700 underline ">Rutas</a>

                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="ml-4 text-sm text-gray-700 underline">Iniciar sesion</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Registro</a>
                        @endif
                    @endauth

                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-2 lg:px-2">




                <div>







                     <div class="bg-white" style="padding:10px ; margin-top:60px; border-radius: 10px;">
                        <div class="flex">
                            <div class="  p-96" style="background-color: rgb(45, 204, 215); padding:30px; padding-left: 120px; padding-right: 100px; border-radius: 10px;" >
                                <div class="" >
                                    <div>
                                        <img src="{{ asset('img/login.png')}}" alt="" style="width: 350px; height: auto; padding:10px">
                                    </div>

                                    <div class="text-center">


                                        <h3 style="color: white ;  " >By Saul alvarez</h3>
                                    </div>
                                </div>
                            </div>
                            <div class=" px-6 pt-14 lg:px-8">
                                <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">

                                    <div class="text-center" style="margin-top:160px;">
                                        <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Viaje Seguro</h1>
                                        <p class="mt-6 text-lg leading-8 text-gray-600">"Seguridad en cada viaje: Conduciendo juntos hacia un futuro más seguro."</p>
                                        <div class="mt-10 flex items-center justify-center gap-x-6">
                                            <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Learn more <span aria-hidden="true">→</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>




                    <div class="bg-white " style="border-radius: 30px;">
                        <div class="">
                            <dl class="text-center">
                                <div style="max-width: 250px;  display: inline-block; vertical-align: top;  padding:10px; margin:49px">
                                    <dt style="font-size: 1rem; line-height: 1.5; color: #718096;">Lineas en servicio </dt>
                                    <dd style="font-size: 2.25rem; line-height: 1.1; font-weight: 600; color: #2d3748;">28 Lineas</dd>
                                </div>
                                <div style="max-width: 250px; display: inline-block; vertical-align: top;  margin:59px">
                                    <dt style="font-size: 1rem; line-height: 1.5; color: #718096;">Rutas disponibles</dt>
                                    <dd style="font-size: 2.25rem; line-height: 1.1; font-weight: 600; color: #2d3748;">5 rutas </dd>
                                </div>
                                <div style="max-width: 250px;  display: inline-block; vertical-align: top; padding:10px; margin:49px">
                                    <dt style="font-size: 1rem; line-height: 1.5; color: #718096;">Movilidades en Servicio</dt>
                                    <dd style="font-size: 2.25rem; line-height: 1.1; font-weight: 600; color: #2d3748;">256 Movilidades</dd>
                                </div>
                            </dl>
                        </div>
                    </div>








                    <div style="background-color: #fff; padding-top:5px; padding-bottom: 2rem; border-radius: 20px; ">
                        <div style="max-width: 87.5rem; margin-left: auto; margin-right: auto; padding-left: 1.5rem; padding-right: 1.5rem;">

                            <div style="margin-top: 4rem; display: flex; flex-wrap: wrap; justify-content: space-between;">
                                <div style="flex: 1 1 0px; padding: 2rem; border-radius: 1.125rem; border: 1px solid #E5E7EB; background-color: #fff;">
                                    <h3 style="font-size: 1.25rem; line-height: 1.6; font-weight: 700; color: #4B5563; margin-top: 0; margin-bottom: 1rem;">
                                        Faltas y sanciones </h3>
                                    <p style="font-size: 1rem; line-height: 1.5556; color: #4B5563; margin-top: 0; margin-bottom: 2rem;">
                                        Los socios afiliados que violen los estatutos
                                         reglamentarios asi como ser derechos,obligaciones, o resoluciones seran sancionados previo proceso
                                         en instancias sindicales.</p>

                                         <ul style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 1rem; list-style-type: none; padding: 0; margin: 0;">
                                            <li style="display: flex; gap: 0.75rem; font-size: 0.875rem; line-height: 1.4286; color: #4B5563;">
                                                <svg style="flex-shrink: 0; width: 1.25rem; height: 1.25rem; color: #667EEA;" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                                </svg>
                                                <span>Severas llamadas de atencion e inhabilitacion de funciones
                                                    operativas, administrativas , dirigenciales y/o direccion de  cooperativa.
                                                </span>
                                            </li>
                                            <li style="display: flex; gap: 0.75rem; font-size: 0.875rem; line-height: 1.4286; color: #4B5563;">
                                                <svg style="flex-shrink: 0; width: 1.25rem; height: 1.25rem; color: #667EEA;" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                                </svg>
                                                <span>Contribuciones economicas a la institucion segun el grado de falta</span>
                                            </li>
                                            <li style="display: flex; gap: 0.75rem; font-size: 0.875rem; line-height: 1.4286; color: #4B5563;">
                                                <svg style="flex-shrink: 0; width: 1.25rem; height: 1.25rem; color: #667EEA;" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                                </svg>
                                                <span>Suspension de hasta un año como socio conductor con perdida de auntiguedad de
                                                    acuerdo a la gravedad del asunto.
                                                </span>
                                            </li>
                                            <li style="display: flex; gap: 0.75rem; font-size: 0.875rem; line-height: 1.4286; color: #4B5563;">
                                                <svg style="flex-shrink: 0; width: 1.25rem; height: 1.25rem; color: #667EEA;" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                                </svg>
                                                <span>Expulsion publica definitiva del sindicato</span>
                                            </li>
                                        </ul>


                                </div>
                                <div style="margin-top: -0.5rem; padding: 0.75rem; width: 24rem; background-color: #F9FAFB;">
                                    <div style="border-radius: 0.75rem; background-color: #F9FAFB; padding: 2.5rem; border: 1px solid #E5E7EB; background-color: rgb(45, 204, 215); ">

                                        <div>
                                            <img src="{{ asset('img/login.png')}}" alt="" style="width: 200px; padding-left:10px">
                                        </div>
                                        <p style="font-size: 2rem; font-weight: 600; color: #4B5563; margin-top: 0; margin-bottom: 1rem;">Faltas y sanciones</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div style="max-width: 58.75rem; margin-left: auto; margin-right: auto; text-align: center;  ">
                        <h2 style="font-size: 1.875rem; line-height: 1.25; font-weight: 700; color: #374151; margin-top: 50px; margin-bottom: 3rem;">
                           Los Fines y objetivos trazados por el sindicato mixto de transporte
                        Simon Bolivar segun su estatuto organico son los siguientes: </h2>
                        <div style="padding-left: 10px;padding-right: 10px;">



                            <ul style="display: grid; grid-template-columns: repeat(1, minmax(0, 1fr)); gap: 1rem; list-style-type: none; padding: 0; margin: 0;">
                                <li style="display: flex; gap: 0.75rem; font-size: 23px; line-height: 1.4286; color: #4B5563;">
                                    <svg style="flex-shrink: 0; width: 1.25rem; height: 1.25rem; color: #667EEA;" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                    </svg>
                                    <span>Mantener la unidad sindical de todos los socios contra cualquier
                                        cualquier intento de division que atente en contra de la institucion
                                    </span>
                                </li>
                                <li style="display: flex; gap: 0.75rem; font-size: 23px; line-height: 1.4286; color: #4B5563;">
                                    <svg style="flex-shrink: 0; width: 1.25rem; height: 1.25rem; color: #667EEA;" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                    </svg>
                                    <span>La buena organizacion en cuanto a los servicios de transporte de pasajeros
                                        que corresponda a las areas de trabajo del sindicato de transporte publico Simon Bolivar,
                                        cuidando la regularidad, continuidad y seguridad acorde a los servicios prestados
                                    </span>
                                </li>
                                <li style="display: flex; gap: 0.75rem; font-size: 23px; line-height: 1.4286; color: #4B5563;">
                                    <svg style="flex-shrink: 0; width: 1.25rem; height: 1.25rem; color: #667EEA;" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                    </svg>
                                    <span>Luchar por las tarifas justas que compensen las horas de trabajo , el capital invertido
                                        y los servicios prestados
                                    </span>
                                </li>
                                <li style="display: flex; gap: 0.75rem; font-size: 23px; line-height: 1.4286; color: #4B5563;">
                                    <svg style="flex-shrink: 0; width: 1.25rem; height: 1.25rem; color: #667EEA;" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                    </svg>
                                    <span>Mantener la unidad permanente de los afiliados a nuestra institucion, incentivando
                                        a la capacitacion y el deporte con la finalidad de conseguir mejores condiciones de
                                        vide.
                                    </span>
                                </li>
                                <li style="display: flex; gap: 0.75rem; font-size: 23px; line-height: 1.4286; color: #4B5563;">
                                    <svg style="flex-shrink: 0; width: 1.25rem; height: 1.25rem; color: #667EEA;" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                    </svg>
                                    <span>Fortalecer y mantener el consultorio de atencion medica basica, ampliando el beneficio
                                        a un seguro general mas amplio.
                                    </span>
                                </li>
                                <li style="display: flex; gap: 0.75rem; font-size: 23px; line-height: 1.4286; color: #4B5563;">
                                    <svg style="flex-shrink: 0; width: 1.25rem; height: 1.25rem; color: #667EEA;" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                    </svg>
                                    <span>Realizar los movimientos economicos y financieros posibles a fin de alcanzar el
                                        bien comun, para establecer formas de recapitalizacion de la economia del socio
                                        propietario y la liberacion economica del socio asalariado.
                                    </span>
                                </li>
                            </ul>

                        </div>


                    </div>





                    <div style="background-color: #fff; padding-top: 2rem;margin-top: 2rem; padding-bottom: 2rem;border-radius: 10px; margin-bottom: 2rem; ">
                        <div style="max-width: 87.5rem; margin-left: auto; margin-right: auto; padding-left: 1.5rem; padding-right: 1.5rem;">
                        <h2 style="text-align: center; font-size: 2rem; font-weight: 600; line-height: 1.7778; color: #4B5563;">"Confiado por los equipos más innovadores del mundo".</h2>
                        <div style="margin-top: 4rem; display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); grid-gap: 2rem; align-items: center; justify-items: center;">
                            <div>
                                <img src="{{ asset('img/OIP.jpg')}}" alt="" style="width: 200px; height: auto; padding:10px">
                            </div>
                            <div>
                                <img src="{{ asset('img/screen.png')}}" alt="" style="width: 150px; height: auto; padding:10px">
                            </div>
                            <img style="max-height: 3rem; width: 100%; object-fit: contain;" src="https://tailwindui.com/img/logos/158x48/transistor-logo-gray-900.svg" alt="Transistor">
                        </div>
                        </div>
                    </div>































            </div>



        </div>
    </body>


    <footer style="background-color: #333; color: #fff; padding: 3rem 0;">
        <div style="  display: flex; align-items: center; ">
        <div style="padding-left:150px;">
            <h3 style="">Enlaces útiles</h3>
            <ul style="list-style-type: none; padding: 0; margin: 0;">
            <li><a href="#" style="color: #fff; text-decoration: none;">Inicio</a></li>
            <li><a href="{{ url('/services') }}" style="color: #fff; text-decoration: none;">Servicios</a></li>
            <li><a href="#" style="color: #fff; text-decoration: none;">Contacto</a></li>
            </ul>
        </div>
        <div style="padding-left:150px;">
            <h3 style="">Síguenos en</h3>
            <ul style="list-style-type: none; padding: 0; margin: 0;">
            <li><a href="#" style="color: #fff; text-decoration: none;">Facebook</a></li>
            <li><a href="#" style="color: #fff; text-decoration: none;">Twitter</a></li>
            <li><a href="#" style="color: #fff; text-decoration: none;">Instagram</a></li>
            </ul>
        </div>
        <div style="padding-left: 170px">
            <h3 style="">Contáctanos</h3>
            <p style="color: #fff; margin: 0;">Correo electrónico: ViajeSegur0@gmail.com</p>
            <p style="color: #fff; margin: 0;">Teléfono: +1234567890</p>
        </div>
        </div>
    </footer>

</html>
