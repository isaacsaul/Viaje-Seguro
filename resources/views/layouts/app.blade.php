<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Agrega la referencia al favicon -->
        <link rel="icon" type="image/png" href="{{ asset('img/login.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


        <!-- Styles -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        <script>
            Livewire.on('alert', function(mensaje){
                Swal.fire({
                title: "Good job!",
                text: mensaje,
                icon: "success"
                });
            });


            Livewire.on('deleteTiposocio', tiposocioId => {
                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "¡No podrás revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sí, eliminarlo"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('show-tiposocio', 'delete', tiposocioId);
                        Swal.fire({
                            title: "¡Eliminado!",
                            text: "El registro ha sido eliminado.",
                            icon: "success"
                        });
                    }
                });
            });



            Livewire.on('deleteNoticia',noticiaId=> {
                Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                if (result.isConfirmed) {

                    Livewire.emitTo('show-noticias', 'delete',noticiaId);


                    Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                    });
                }
                });

            });


            Livewire.on('deleteLinea', lineaId => {
                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "¡No podrás revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sí, eliminarlo"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('show-lineas', 'delete', lineaId);
                        Swal.fire({
                            title: "¡Eliminado!",
                            text: "Tu archivo ha sido eliminado.",
                            icon: "success"
                        });
                    }
                });
            });


            Livewire.on('deleteGrupo', grupoId => {
                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "¡No podrás revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sí, eliminarlo"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('show-grupos', 'delete', grupoId); // Asegúrate de reemplazar 'show-grupos' con el nombre correcto del componente
                        Swal.fire({
                            title: "¡Eliminado!",
                            text: "Tu grupo ha sido eliminado.",
                            icon: "success"
                        });
                    }
                });
            });


            Livewire.on('deleteSancion', sancionId => {
                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "¡No podrás revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sí, eliminarlo"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('show-sanciones', 'delete', sancionId); // Asegúrate de reemplazar 'show-sanciones' con el nombre correcto del componente
                        Swal.fire({
                            title: "¡Eliminado!",
                            text: "Tu sanción ha sido eliminada.",
                            icon: "success"
                        });
                    }
                });
            });


            Livewire.on('deleteInfraccion', infraccionId => {
                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "¡No podrás revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sí, eliminarlo"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('show-infracciones', 'delete', infraccionId); // Asegúrate de reemplazar 'show-infracciones' con el nombre correcto del componente
                        Swal.fire({
                            title: "¡Eliminado!",
                            text: "Tu infracción ha sido eliminada.",
                            icon: "success"
                        });
                    }
                });
            });


            Livewire.on('deleteMovilidad', movilidadId => {
                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "¡No podrás revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sí, eliminarlo"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('show-movilidades', 'delete', movilidadId); // Asegúrate de reemplazar 'show-movilidades' con el nombre correcto del componente
                        Swal.fire({
                            title: "¡Eliminado!",
                            text: "Tu movilidad ha sido eliminada.",
                            icon: "success"
                        });
                    }
                });
            });

            Livewire.on('deleteChofer', choferId => {
                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "¡No podrás revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sí, eliminarlo"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('show-choferes', 'delete', choferId); // Reemplaza 'nombre-del-componente-chofers' con el nombre correcto del componente de Livewire para los choferes
                        Swal.fire({
                            title: "¡Eliminado!",
                            text: "El chofer ha sido eliminado.",
                            icon: "success"
                        });
                    }
                });
            });


            // Nueva alerta de cierre automático con temporizador
            Livewire.on('autoCloseAlert', () => {
                let timerInterval;
                Swal.fire({
                    title: "Alerta de cierre automático",
                    html: "Esta alerta se cerrará en <b></b> milisegundos.",
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading();
                        const timer = Swal.getPopup().querySelector("b");
                        timerInterval = setInterval(() => {
                            timer.textContent = `${Swal.getTimerLeft()}`;
                        }, 100);
                    },
                    willClose: () => {
                        clearInterval(timerInterval);
                    }
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        console.log("La alerta se cerró automáticamente");
                    }
                });
            });






        </script>
    </body>
</html>
