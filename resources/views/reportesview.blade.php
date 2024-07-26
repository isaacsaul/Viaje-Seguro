
{{-- <x-app-layout>
    <div style="display: flex; margin-top:10px">
        <!-- Contenedor del listado -->
        <div style="flex: 1; padding: 20px; background-color: #f0f0f0; border-right: 1px solid #ccc;">
            <h1 style="margin-bottom: 20px; font-size: 24px; font-weight: bold;">Listado de las rutas</h1>
            <div style="position: relative;">
                <button onclick="showMirafloresRoute()" style="padding: 10px; padding-left: 50px; padding-right: 50px; border-radius: 5px; margin-bottom: 10px; background-color: #4CAF50; color: white; border: none;">Ruta de la Linea 369</button>
                <br>
                <button onclick="showPampahasiRoute()" style="padding: 10px;padding-left: 50px; padding-right: 50px; border-radius: 5px; margin-bottom: 10px; background-color: #FFA500; color: white; border: none;">Ruta de la Linea 852</button>
                <br>
                <button onclick="showLinea296Route()" style="padding: 10px;padding-left: 50px; padding-right: 50px; border-radius: 5px; margin-bottom: 10px; background-color: #3366FF; color: white; border: none;">Ruta de la Línea 296</button>
            </div>
        </div>


        <!-- Contenedor del mapa -->
        <div style="flex: 2;">
            <h1>Mapa de Google</h1>
            <div id="map" style="height: 550px; width: 100%; width: 1000px"></div>
        </div>
    </div>

    <script>
        var mirafloresRoutePoints = [
            { lat: -16.495680, lng: -68.103905 },
            { lat: -16.498561, lng: -68.104721 },
            { lat: -16.497861, lng: -68.104265 },
            { lat: -16.499667, lng: -68.105445 },
            { lat: -16.501788, lng: -68.105121 },
            { lat: -16.501511, lng: -68.106146 },
            { lat: -16.497715, lng: -68.108157 },
            { lat: -16.496722, lng: -68.109876 },




        ];

        var pampahasiRoutePoints = [
            { lat: -16.485956, lng: -68.094937 },
            { lat: -16.488648, lng: -68.097719 },
            { lat: -16.490512, lng: -68.100151 },
            { lat: -16.490925, lng: -68.101484 },
            { lat: -16.493131, lng: -68.101183 },
            { lat: -16.494753, lng: -68.100687 },
            { lat: -16.495650, lng: -68.101996 },
            { lat: -16.499967, lng: -68.101835 },
            { lat: -16.503258, lng: -68.104149 }


        ];

        var linea296RoutePoints = [
            { lat: -16.496921, lng: -68.097102 },
            { lat: -16.498566, lng: -68.098046 }
        ];


        var map; // Variable global para el mapa
        var userMarker; // Variable global para el marcador de la ubicación del usuario
        var mirafloresMarkers = []; // Array para almacenar los marcadores de la ruta de Miraflores
        var pampahasiMarkers = []; // Array para almacenar los marcadores de la ruta de Pampahasi
        var lineaMarkers = []; // Array para almacenar los marcadores de la ruta de


        // Función para mostrar la ubicación actual del usuario y los puntos de ambas rutas
        function showMapWithUserAndRoutes() {
            // Verifica si el navegador soporta geolocalización
            if (navigator.geolocation) {
                // Solicita la ubicación actual al usuario
                navigator.geolocation.getCurrentPosition(function(position) {
                    var userLocation = { lat: position.coords.latitude, lng: position.coords.longitude };

                    // Inicializa el mapa centrado en la ubicación del usuario
                    map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 15, // Nivel de zoom
                        center: userLocation // Centro del mapa en la ubicación del usuario
                    });

                    // Crea un marcador en la ubicación actual del usuario
                    userMarker = new google.maps.Marker({
                        position: userLocation,
                        map: map,
                        title: '¡Tu ubicación actual!'
                    });

                    // Recorre todos los puntos de la ruta de Miraflores y muestra un marcador en cada uno
                    mirafloresRoutePoints.forEach(function(point, index) {
                        var marker = new google.maps.Marker({
                            position: point,
                            map: map,
                            icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png' // Icono para los puntos de la ruta de Miraflores
                        });
                        mirafloresMarkers.push(marker); // Almacena el marcador en el array correspondiente
                    });

                    // Recorre todos los puntos de la ruta de Pampahasi y muestra un marcador en cada uno
                    pampahasiRoutePoints.forEach(function(point, index) {
                        var marker = new google.maps.Marker({
                            position: point,
                            map: map,
                            icon: 'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png' // Icono para los puntos de la ruta de Pampahasi
                        });
                        pampahasiMarkers.push(marker); // Almacena el marcador en el array correspondiente
                    });

                    // Recorre todos los puntos de la ruta de la Línea 296 y muestra un marcador en cada uno
                    linea296RoutePoints.forEach(function(point, index) {
                        var marker = new google.maps.Marker({
                            position: point,
                            map: map,
                            icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png' // Icono para los puntos de la ruta de la Línea 296
                        });
                        // Almacena el marcador en el array correspondiente si lo necesitas para ocultarlo más tarde
                        lineaMarkers.push(marker);
                    });


                });
            } else {
                // Si el navegador no soporta geolocalización, muestra un mensaje de error
                alert('Tu navegador no soporta geolocalización.');
            }
        }

        // Función para mostrar solo la ruta de Miraflores
        function showMirafloresRoute() {
            // Oculta los marcadores de la ruta de Pampahasi
            pampahasiMarkers.forEach(function(marker) {
                marker.setMap(null);
            });

            // Muestra los marcadores de la ruta de Miraflores
            mirafloresMarkers.forEach(function(marker) {
                marker.setMap(map);
            });
        }

        // Función para mostrar solo la ruta de Pampahasi
        function showPampahasiRoute() {
            // Oculta los marcadores de la ruta de Miraflores
            mirafloresMarkers.forEach(function(marker) {
                marker.setMap(null);
            });

            // Muestra los marcadores de la ruta de Pampahasi
            pampahasiMarkers.forEach(function(marker) {
                marker.setMap(map);
            });
        }

        function showLinea296Route() {
    // Oculta los marcadores de las otras rutas
    mirafloresMarkers.forEach(function(marker) {
        marker.setMap(null);
    });

    pampahasiMarkers.forEach(function(marker) {
        marker.setMap(null);
    });

    // Muestra los marcadores de la ruta de la Línea 296
    linea296RoutePoints.forEach(function(point, index) {
        var marker = new google.maps.Marker({
            position: point,
            map: map,
            icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png' // Icono para los puntos de la ruta de la Línea 296
        });
        lineaMarkers.push(marker); // Almacena el marcador en el array correspondiente
    });
}




        // Carga la API de Google Maps
        document.addEventListener('livewire:load', function () {
            var script = document.createElement('script');
            script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyA4VwJsd5ZoreitmBKcEOKWNKn-joqD0DI';
            script.defer = true;
            script.async = true;
            script.onload = function() {
                // Cuando la API de Google Maps haya cargado, muestra el mapa con la ubicación actual y los puntos de ambas rutas
                showMapWithUserAndRoutes();
            };
            document.head.appendChild(script);
        });
    </script>
</x-app-layout> --}}


{{-- <x-app-layout>
    <div style="display: flex; margin-top:10px">
        <!-- Contenedor del listado -->
        <div style="flex: 1; padding: 20px; background-color: #f0f0f0; border-right: 1px solid #ccc;">
            <h1 style="margin-bottom: 20px; font-size: 24px; font-weight: bold;">Listado de las rutas</h1>
            <div style="position: relative;">

                 <button onclick="showMirafloresRoute()" style="padding: 10px; padding-left: 10px; border-radius: 5px; background-color: #ffffff; color: rgb(54, 134, 7); border: none; display: flex; align-items: center; margin: 0;">
                    <img src="https://cdn-icons-gif.flaticon.com/6844/6844394.gif" loading="lazy" alt="destino" title="destino" width="42" height="42" style="margin-right: 10px;">
                    <span style="margin-right: 40px;">Ruta de la Línea 369</span>
                </button>
                <button onclick="showPampahasiRoute()" style="padding: 10px; padding-left: 10px; border-radius: 5px; background-color: #ffffff; color: rgb(219, 172, 17); border: none; display: flex; align-items: center; margin: 0;">
                    <img src="https://cdn-icons-gif.flaticon.com/6844/6844394.gif" loading="lazy" alt="destino" title="destino" width="42" height="32" style="margin-right: 10px;">
                    <span style="margin-right: 40px;">Ruta de la Línea 852</span>
                </button>

                <button onclick="showLinea296Route()" style="padding: 10px; padding-left: 10px; border-radius: 5px; margin-bottom: 10px; background-color: #ffffff; color: rgb(22, 83, 196); border: none; display: flex; align-items: center; margin: 0;">
                    <img src="https://cdn-icons-gif.flaticon.com/6844/6844394.gif" loading="lazy" alt="destino" title="destino" width="42" height="32" style="margin-right: 10px;">
                    <span style="margin-right: 40px;">Ruta de la Línea 296</span>
                </button>

                <button onclick="showLinea331Route()" style="padding: 10px; padding-left: 10px; border-radius: 5px; margin-bottom: 10px; background-color: #ffffff; color: rgb(180, 34, 34); border: none; display: flex; align-items: center; margin: 0;">
                    <img src="https://cdn-icons-gif.flaticon.com/6844/6844394.gif" loading="lazy" alt="destino" title="destino" width="42" height="32" style="margin-right: 10px;">
                    <span style="margin-right: 40px;">Ruta de la Línea 331</span>
                </button>

                <button onclick="showLinea230Route()" style="padding: 10px; padding-left: 10px; border-radius: 5px; margin-bottom: 10px; background-color: #ffffff; color: rgb(81, 11, 138); border: none; display: flex; align-items: center; margin: 0;">
                    <img src="https://cdn-icons-gif.flaticon.com/6844/6844394.gif" loading="lazy" alt="destino" title="destino" width="42" height="32" style="margin-right: 10px;">
                    <span style="margin-right: 40px;">Ruta de la Línea 230</span>
                </button>

                <button onclick="showLinea332Route()" style="padding: 10px; padding-left: 10px; border-radius: 5px; margin-bottom: 10px; background-color: #ffffff; color: rgb(150, 148, 39); border: none; display: flex; align-items: center; margin: 0;">
                    <img src="https://cdn-icons-gif.flaticon.com/6844/6844394.gif" loading="lazy" alt="destino" title="destino" width="42" height="32" style="margin-right: 10px;">
                    <span style="margin-right: 40px;">Ruta de la Línea 332</span>
                </button>

                <button onclick="showLinea304Route()" style="padding: 10px; padding-left: 10px; border-radius: 5px; margin-bottom: 10px; background-color: #ffffff; color: rgb(218, 52, 176); border: none; display: flex; align-items: center; margin: 0;">
                    <img src="https://cdn-icons-gif.flaticon.com/6844/6844394.gif" loading="lazy" alt="destino" title="destino" width="42" height="32" style="margin-right: 10px;">
                    <span style="margin-right: 40px;">Ruta de la Línea 304</span>
                </button>
                 </div>
        </div>


        <!-- Contenedor del mapa -->
        <div style="flex: 2;">
            <h1>Mapa de Google</h1>
            <div id="map" style="height: 550px; width: 100%; width: 1000px"></div>
        </div>
    </div>

    <script>
        var mirafloresRoutePoints = [
            { lat: -16.488340, lng: -68.104418 },
            { lat: -16.488961, lng: -68.104323 },
            { lat: -16.490062, lng: -68.104642 },

        ];

        var pampahasiRoutePoints = [
            { lat: -16.485956, lng: -68.094937 },
            { lat: -16.488648, lng: -68.097719 },




        ];

        var linea296RoutePoints = [
            { lat: -16.490797, lng: -68.104932 },
            { lat: -16.491080, lng: -68.103660 },
            { lat: -16.492006, lng: -68.103145 },
            { lat: -16.493966, lng: -68.102850 },
            { lat: -16.495447, lng: -68.102614 },



        ];

        var linea331RoutePoints = [
            { lat: -16.494472, lng: -68.111869 },
            { lat: -16.495727, lng: -68.111779 },
            { lat: -16.498114, lng: -68.114182 }
        ];

        var linea230RoutePoints = [
            { lat: -16.495107, lng: -68.101340 },
            { lat: -16.495603, lng: -68.102427 },
            { lat: -16.496251, lng: -68.104373 },
            { lat: -16.497479, lng: -68.104193 },

        ];

        var linea332RoutePoints = [
            { lat: -16.495686, lng: -68.115984 },
            { lat: -16.493670, lng: -68.114439 }
        ];

        var linea304RoutePoints = [
            { lat: -16.490691, lng: -68.105487 },
            { lat: -16.490880, lng: -68.104774 },
            { lat: -16.491016, lng: -68.104061 },
            { lat: -16.491068, lng: -68.103672 },
            { lat: -16.491747, lng: -68.103186 },

        ];

        var map; // Variable global para el mapa
        var userMarker; // Variable global para el marcador de la ubicación del usuario
        var allMarkers = []; // Array para almacenar todos los marcadores de las rutas

        // Función para mostrar la ubicación actual del usuario y los puntos de todas las rutas
        function showMapWithUserAndRoutes() {
            // Verifica si el navegador soporta geolocalización
            if (navigator.geolocation) {
                // Solicita la ubicación actual al usuario
                navigator.geolocation.getCurrentPosition(function(position) {
                    var userLocation = { lat: position.coords.latitude, lng: position.coords.longitude };

                    // Inicializa el mapa centrado en la ubicación del usuario
                    map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 15, // Nivel de zoom
                        center: userLocation // Centro del mapa en la ubicación del usuario
                    });

                    // Crea un marcador en la ubicación actual del usuario
                    userMarker = new google.maps.Marker({
                        position: userLocation,
                        map: map,
                        title: '¡Tu ubicación actual!'
                    });

                    // Recorre todos los puntos de la ruta de Miraflores y muestra un marcador en cada uno
                    mirafloresRoutePoints.forEach(function(point) {
                        var marker = new google.maps.Marker({
                            position: point,
                            map: map,
                            icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png' // Icono para los puntos de la ruta de Miraflores
                        });
                        allMarkers.push(marker); // Almacena el marcador en el array correspondiente
                    });

                    // Recorre todos los puntos de la ruta de Pampahasi y muestra un marcador en cada uno
                    pampahasiRoutePoints.forEach(function(point) {
                        var marker = new google.maps.Marker({
                            position: point,
                            map: map,
                            icon: 'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png' // Icono para los puntos de la ruta de Pampahasi
                        });
                        allMarkers.push(marker); // Almacena el marcador en el array correspondiente
                    });

                    // Recorre todos los puntos de la ruta de la Línea 296 y muestra un marcador en cada uno
                    linea296RoutePoints.forEach(function(point) {
                        var marker = new google.maps.Marker({
                            position: point,
                            map: map,
                            icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png' // Icono para los puntos de la ruta de la Línea 296
                        });
                        allMarkers.push(marker); // Almacena el marcador en el array correspondiente
                    });

                    // Recorre todos los puntos de la ruta de la Línea 331 y muestra un marcador en cada uno
                    linea331RoutePoints.forEach(function(point) {
                        var marker = new google.maps.Marker({
                            position: point,
                            map: map,
                            icon: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png' // Icono para los puntos de la ruta de la Línea 331
                        });
                        allMarkers.push(marker); // Almacena el marcador en el array correspondiente
                    });

                    // Recorre todos los puntos de la ruta de la Línea 230 y muestra un marcador en cada uno
                    linea230RoutePoints.forEach(function(point) {
                        var marker = new google.maps.Marker({
                            position: point,
                            map: map,
                            icon: 'http://maps.google.com/mapfiles/ms/icons/purple-dot.png' // Icono para los puntos de la ruta de la Línea 230
                        });
                        allMarkers.push(marker); // Almacena el marcador en el array correspondiente
                    });

                    // Recorre todos los puntos de la ruta de la Línea 332 y muestra un marcador en cada uno
                    linea332RoutePoints.forEach(function(point) {
                        var marker = new google.maps.Marker({
                            position: point,
                            map: map,
                            icon: 'http://maps.google.com/mapfiles/ms/icons/orange-dot.png' // Icono para los puntos de la ruta de la Línea 332
                        });
                        allMarkers.push(marker); // Almacena el marcador en el array correspondiente
                    });

                    // Recorre todos los puntos de la ruta de la Línea 304 y muestra un marcador en cada uno
                    linea304RoutePoints.forEach(function(point) {
                        var marker = new google.maps.Marker({
                            position: point,
                            map: map,
                            icon: 'http://maps.google.com/mapfiles/ms/icons/pink-dot.png' // Icono para los puntos de la ruta de la Línea 304
                        });
                        allMarkers.push(marker); // Almacena el marcador en el array correspondiente
                    });

                });
            } else {
                // Si el navegador no soporta geolocalización, muestra un mensaje de error
                alert('Tu navegador no soporta geolocalización.');
            }
        }

        // Función para ocultar todos los marcadores de las rutas
        function hideAllRoutes() {
            allMarkers.forEach(function(marker) {
                marker.setMap(null);
            });
        }

        // Función para mostrar solo la ruta de Miraflores
        function showMirafloresRoute() {
            hideAllRoutes();
            mirafloresRoutePoints.forEach(function(point) {
                var marker = new google.maps.Marker({
                    position: point,
                    map: map,
                    icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png'
                });
                allMarkers.push(marker);
            });
        }

        // Función para mostrar solo la ruta de Pampahasi
        function showPampahasiRoute() {
            hideAllRoutes();
            pampahasiRoutePoints.forEach(function(point) {
                var marker = new google.maps.Marker({
                    position: point,
                    map: map,
                    icon: 'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png'
                });
                allMarkers.push(marker);
            });
        }

        // Función para mostrar solo la ruta de la Línea 296
        function showLinea296Route() {
            hideAllRoutes();
            linea296RoutePoints.forEach(function(point) {
                var marker = new google.maps.Marker({
                    position: point,
                    map: map,
                    icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png'
                });
                allMarkers.push(marker);
            });
        }

        // Función para mostrar solo la ruta de la Línea 331
        function showLinea331Route() {
            hideAllRoutes();
            linea331RoutePoints.forEach(function(point) {
                var marker = new google.maps.Marker({
                    position: point,
                    map: map,
                    icon: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png'
                });
                allMarkers.push(marker);
            });
        }

        // Función para mostrar solo la ruta de la Línea 230
        function showLinea230Route() {
            hideAllRoutes();
            linea230RoutePoints.forEach(function(point) {
                var marker = new google.maps.Marker({
                    position: point,
                    map: map,
                    icon: 'http://maps.google.com/mapfiles/ms/icons/purple-dot.png'
                });
                allMarkers.push(marker);
            });
        }

        // Función para mostrar solo la ruta de la Línea 332
        function showLinea332Route() {
            hideAllRoutes();
            linea332RoutePoints.forEach(function(point) {
                var marker = new google.maps.Marker({
                    position: point,
                    map: map,
                    icon: 'http://maps.google.com/mapfiles/ms/icons/orange-dot.png'
                });
                allMarkers.push(marker);
            });
        }

        // Función para mostrar solo la ruta de la Línea 304
        function showLinea304Route() {
            hideAllRoutes();
            linea304RoutePoints.forEach(function(point) {
                var marker = new google.maps.Marker({
                    position: point,
                    map: map,
                    icon: 'http://maps.google.com/mapfiles/ms/icons/pink-dot.png'
                });
                allMarkers.push(marker);
            });
        }

        // Carga la API de Google Maps
        document.addEventListener('livewire:load', function () {
            var script = document.createElement('script');
            script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyA4VwJsd5ZoreitmBKcEOKWNKn-joqD0DI';
            script.defer = true;
            script.async = true;
            script.onload = function() {
                // Cuando la API de Google Maps haya cargado, muestra el mapa con la ubicación actual y los puntos de todas las rutas
                showMapWithUserAndRoutes();
            };
            document.head.appendChild(script);
        });
    </script>
</x-app-layout> --}}


{{-- Vista de Blade para mostrar el mapa y los botones --}}
{{-- <x-app-layout>
    <div style="display: flex; margin-top:10px">
        <!-- Contenedor del listado -->
        <div style="flex: 1; padding: 20px; background-color: #f0f0f0; border-right: 1px solid #ccc;">
            <h1 style="margin-bottom: 20px; font-size: 24px; font-weight: bold;">Listado de las rutas</h1>
            <div style="position: relative;">
                <!-- Botones para mostrar las rutas -->
                @foreach ($rutas as $ruta)
                    <button onclick="showRoute({{ $ruta->id }})" style="padding: 10px; padding-left: 10px; border-radius: 5px; background-color: #ffffff; border: none; display: flex; align-items: center; margin: 0;">
                        <span style="margin-right: 40px;">{{ $ruta->nombre }}</span>
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Contenedor del mapa -->
        <div style="flex: 2;">
            <h1>Mapa de Google</h1>
            <div id="map" style="height: 550px; width: 100%; width: 1000px"></div>
        </div>
    </div>

    <script>
        var map;
        var userMarker;
        var allMarkers = [];

        // Función para mostrar la ubicación actual del usuario y los puntos de la ruta seleccionada
        function showMapWithUserAndRoute(routePoints) {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var userLocation = { lat: position.coords.latitude, lng: position.coords.longitude };

                    map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 15,
                        center: userLocation
                    });

                    userMarker = new google.maps.Marker({
                        position: userLocation,
                        map: map,
                        title: '¡Tu ubicación actual!'
                    });

                    // Mostrar los puntos de la ruta
                    routePoints.forEach(function(point) {
                        var marker = new google.maps.Marker({
                            position: { lat: parseFloat(point.latitud), lng: parseFloat(point.longitud) },
                            map: map,
                            icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png'
                        });
                        allMarkers.push(marker);
                    });
                });
            } else {
                alert('Tu navegador no soporta geolocalización.');
            }
        }

        // Ocultar todos los marcadores
        function hideAllMarkers() {
            allMarkers.forEach(function(marker) {
                marker.setMap(null);
            });
        }

        // Función para mostrar la ruta seleccionada
        function showRoute(routeId) {
            hideAllMarkers();
            // Realizar una petición AJAX para obtener los puntos de la ruta desde el servidor
            // Supongamos que la ruta se obtiene como un objeto JSON con una propiedad 'points'
            // Utilizamos un ejemplo hipotético de cómo podría ser la petición AJAX
            $.ajax({
                url: '/ruta/' + routeId + '/puntos',
                type: 'GET',
                success: function(response) {
                    var routePoints = response.points;
                    showMapWithUserAndRoute(routePoints);
                },
                error: function(xhr, status, error) {
                    console.error('Error al obtener los puntos de la ruta:', error);
                }
            });
        }

        // Carga la API de Google Maps
        document.addEventListener('livewire:load', function () {
            var script = document.createElement('script');
            script.src = 'https://maps.googleapis.com/maps/api/js?key=API_KEY'; // Reemplazar 'API_KEY' con tu clave de API de Google Maps
            script.defer = true;
            script.async = true;
            script.onload = function() {
                // Cuando la API de Google Maps haya cargado, muestra el mapa con la ubicación actual
                showMapWithUserAndRoute([]);
            };
            document.head.appendChild(script);
        });
    </script>
</x-app-layout> --}}

<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}


        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            @livewire('show-reportes')

        </div>

    </div>




</x-app-layout>


