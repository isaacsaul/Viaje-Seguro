<!-- Contenedor principal -->
<div style="display: flex;">

    <!-- Contenedor de los botones de ruta -->
    <div style="padding: 20px;">
        <h1 style="margin-bottom: 10px;">Seleccionar Ruta</h1>
        <div id="botonesRuta">
            @foreach($rutas as $ruta)
                <button class="overflow-hidden shadow-xl " style="display: block; margin-bottom: 10px; padding: 10px 50px; background-color: #26b3ab; color: white; border: none; border-radius: 5px; cursor: pointer;" onclick="mostrarRuta({{ $ruta->id }})">{{ $ruta->nombre }}</button>
            @endforeach
        </div>
    </div>

    <!-- Contenedor del mapa -->
    <div style="flex: 1;">
        <h1>Mapa de Google</h1>
        <div id="map" style="height: 600px; width: 100%;"></div>
    </div>
</div>



<script>
    var map;
    var userLocationMarker;
    var todosLosPuntos = @json($todosLosPuntos);
    var markers = [];

    // Función para inicializar el mapa
    function initMap() {
        // Configuración inicial del mapa con coordenadas temporales
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: { lat: 0, lng: 0 } // Coordenadas temporales
        });

        // Intenta obtener la ubicación del usuario
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var userLocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                // Establecer el centro del mapa en la ubicación del usuario
                map.setCenter(userLocation);

                // Crear un marcador para la ubicación del usuario
                userLocationMarker = new google.maps.Marker({
                    position: userLocation,
                    map: map,
                    title: 'Tu ubicación'
                });

                // Actualiza la ubicación del usuario continuamente
                watchUserLocation();
            }, function() {
                // Manejar errores de geolocalización
                handleLocationError(true, map.getCenter());
            });
        } else {
            // El navegador no soporta geolocalización
            handleLocationError(false, map.getCenter());
        }

        // Crear marcadores para todas las coordenadas registradas, utilizando colores específicos para cada ruta
        todosLosPuntos.forEach(function(punto) {
            var icono;
            switch (punto.ruta_id) {
                case 1: // Ruta de linea 369
                    icono = 'http://maps.google.com/mapfiles/ms/icons/green-dot.png';
                    break;
                case 2: // Ruta de linea 852
                    icono = 'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png';
                    break;
                case 3: // Ruta de la Línea 296
                    icono = 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png';
                    break;
                case 4: // Ruta de la Línea 331
                    icono = 'http://maps.google.com/mapfiles/ms/icons/red-dot.png';
                    break;
                case 5: // Ruta de la Línea 230
                    icono = 'http://maps.google.com/mapfiles/ms/icons/purple-dot.png';
                    break;
                case 6: // Ruta de la Línea 332
                    icono = 'http://maps.google.com/mapfiles/ms/icons/orange-dot.png';
                    break;
                case 7: // Ruta de la Línea 304
                    icono = 'http://maps.google.com/mapfiles/ms/icons/pink-dot.png';
                    break;
                default:
                    // Si no se especifica un color para la ruta, se utiliza el marcador verde por defecto
                    icono = 'http://maps.google.com/mapfiles/ms/icons/green-dot.png';
                    break;
            }

            var marker = new google.maps.Marker({
                position: { lat: parseFloat(punto.latitud), lng: parseFloat(punto.longitud) },
                map: map,
                title: 'Ruta ID: ' + punto.ruta_id,
                icon: icono
            });
            markers.push(marker); // Agregar el marcador al array de marcadores
        });
    }

    // Función para manejar errores de geolocalización
    function handleLocationError(browserHasGeolocation, pos) {
        var infoWindow = new google.maps.InfoWindow({
            position: pos,
            content: browserHasGeolocation ?
                'Error: El servicio de geolocalización ha fallado.' :
                'Error: Tu navegador no soporta geolocalización.'
        });
        infoWindow.open(map);
    }

    // Función para actualizar la ubicación del usuario continuamente
    function watchUserLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.watchPosition(function(position) {
                var userLocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                // Actualizar la posición del marcador
                if (userLocationMarker) {
                    userLocationMarker.setPosition(userLocation);
                }
                // Establecer el centro del mapa en la nueva ubicación del usuario
                map.setCenter(userLocation);
            });
        }
    }
     // Función para mostrar los puntos de una ruta específica
     function mostrarRuta(rutaId) {
        // Ocultar todos los marcadores en el mapa
        markers.forEach(function(marker) {
            marker.setVisible(false);
        });

        // Mostrar los marcadores correspondientes a la ruta seleccionada
        markers.filter(function(marker) {
            return marker.title.includes('Ruta ID: ' + rutaId);
        }).forEach(function(marker) {
            marker.setVisible(true);
        });
    }

    // Carga la API de Google Maps y llama a la función initMap después de cargar
    function loadGoogleMap() {
        var script = document.createElement('script');
        script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyA4VwJsd5ZoreitmBKcEOKWNKn-joqD0DI&callback=initMap';
        script.defer = true;
        script.async = true;
        document.head.appendChild(script);
    }

    // Llama a la función loadGoogleMap después de que el contenido se haya cargado
    document.addEventListener('DOMContentLoaded', function () {
        loadGoogleMap();
    });
</script>
