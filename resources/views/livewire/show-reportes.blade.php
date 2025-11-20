<!-- Contenedor principal -->
<div style="display: flex; min-height: 100vh; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">

    <!-- Contenedor de los botones de ruta -->
    <div style="padding: 30px; width: 350px; background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1); display: flex; flex-direction: column; height: 100vh; overflow: hidden;">
        <h1 style="margin-bottom: 30px; color: #2c3e50; font-size: 28px; font-weight: 700; text-align: center; border-bottom: 3px solid #3498db; padding-bottom: 15px; flex-shrink: 0;">
            🚌 Seleccionar Ruta
        </h1>

        <!-- Debug info - remover en producción -->
        <div style="background: #f8f9fa; padding: 10px; margin-bottom: 15px; border-radius: 8px; font-size: 12px; color: #6c757d;">
            <strong></strong> Total de rutas: {{ count($rutas) }}
        </div>

        <div id="botonesRuta" style="display: flex; flex-direction: column; gap: 15px; flex: 1; overflow-y: auto; padding-right: 10px; min-height: 0;">
            @php
                $rutasUnicas = $rutas->unique('id');
                $totalRutas = $rutasUnicas->count();
            @endphp

            @foreach($rutasUnicas as $ruta)
                <div class="ruta-card"
                     style="background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
                            border: 2px solid #e9ecef;
                            border-radius: 15px;
                            padding: 20px;
                            cursor: pointer;
                            transition: all 0.3s ease;
                            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                            position: relative;
                            overflow: hidden;
                            min-height: 120px;
                            flex-shrink: 0;"
                     onclick="mostrarRuta({{ $ruta->id }})"
                     data-ruta-id="{{ $ruta->id }}">

                    <!-- Icono de la ruta -->
                    <div style="display: flex; align-items: center; margin-bottom: 10px;">
                        <div class="ruta-icon"
                             style="width: 40px;
                                    height: 40px;
                                    border-radius: 50%;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    margin-right: 15px;
                                    font-size: 18px;
                                    font-weight: bold;
                                    color: white;
                                    background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
                                    flex-shrink: 0;">
                            🚌
                        </div>
                        <div style="flex: 1; min-width: 0;">
                            <h3 style="margin: 0; color: #2c3e50; font-size: 18px; font-weight: 600; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $ruta->nombre }}</h3>
                            <p style="margin: 5px 0 0 0; color: #7f8c8d; font-size: 14px;">Línea de transporte</p>
                        </div>
                    </div>

                    <!-- Información adicional -->
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 15px;">
                        <span class="status-indicator"
                              style="padding: 4px 12px;
                                     border-radius: 20px;
                                     font-size: 12px;
                                     font-weight: 500;
                                     background: #e8f5e8;
                                     color: #27ae60;
                                     white-space: nowrap;">
                            Activa
                        </span>
                        <div class="arrow-icon"
                             style="color: #bdc3c7;
                                    font-size: 20px;
                                    transition: all 0.3s ease;
                                    flex-shrink: 0;">
                            →
                        </div>
                    </div>

                    <!-- Overlay de hover -->
                    <div class="hover-overlay"
                         style="position: absolute;
                                top: 0;
                                left: 0;
                                right: 0;
                                bottom: 0;
                                background: linear-gradient(135deg, rgba(52, 152, 219, 0.1) 0%, rgba(41, 128, 185, 0.1) 100%);
                                opacity: 0;
                                transition: opacity 0.3s ease;
                                border-radius: 15px;">
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Botón para mostrar todas las rutas -->
        <div class="ruta-card todas-las-rutas"
             style="background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
                    border: 2px solid #27ae60;
                    border-radius: 15px;
                    padding: 20px;
                    cursor: pointer;
                    transition: all 0.3s ease;
                    box-shadow: 0 4px 15px rgba(46, 204, 113, 0.3);
                    margin-top: 20px;
                    position: relative;
                    overflow: hidden;
                    flex-shrink: 0;
                    min-height: 120px;"
             onclick="mostrarTodasLasRutas()">

            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                <div class="ruta-icon"
                     style="width: 40px;
                            height: 40px;
                            border-radius: 50%;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            margin-right: 15px;
                            font-size: 18px;
                            font-weight: bold;
                            color: white;
                            background: rgba(255, 255, 255, 0.2);
                            flex-shrink: 0;">
                    🌍
                </div>
                <div style="flex: 1; min-width: 0;">
                    <h3 style="margin: 0; color: white; font-size: 18px; font-weight: 600; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Todas las Rutas</h3>
                    <p style="margin: 5px 0 0 0; color: rgba(255, 255, 255, 0.8); font-size: 14px;">Ver todas las líneas</p>
                </div>
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 15px;">
                <span class="status-indicator"
                      style="padding: 4px 12px;
                             border-radius: 20px;
                             font-size: 12px;
                             font-weight: 500;
                             background: rgba(255, 255, 255, 0.2);
                             color: white;
                             white-space: nowrap;">
                    Disponible
                </span>
                <div class="arrow-icon"
                     style="color: rgba(255, 255, 255, 0.8);
                            font-size: 20px;
                            transition: all 0.3s ease;
                            flex-shrink: 0;">
                    →
                </div>
            </div>
        </div>
    </div>

    <!-- Contenedor del mapa -->
    <div style="flex: 1; position: relative;">
        <div style="position: absolute; top: 20px; left: 20px; z-index: 1000; background: white; padding: 15px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);">
            <h2 style="margin: 0; color: #2c3e50; font-size: 20px; font-weight: 600;">🗺️ Mapa de Rutas</h2>
        </div>
        <div id="map" style="height: 100vh; width: 100%;"></div>
    </div>
</div>

<style>
    /* Estilos CSS para mejorar la interactividad */
    .ruta-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        border-color: #3498db;
    }

    .ruta-card:hover .hover-overlay {
        opacity: 1;
    }

    .ruta-card:hover .arrow-icon {
        transform: translateX(5px);
        color: #3498db;
    }

    .ruta-card.active {
        border-color: #3498db;
        background: linear-gradient(135deg, #ebf3fd 0%, #d6eaf8 100%);
        box-shadow: 0 8px 25px rgba(52, 152, 219, 0.2);
    }

    .ruta-card.active .status-indicator {
        background: #3498db;
        color: white;
    }

    .todas-las-rutas:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(46, 204, 113, 0.4);
    }

    .todas-las-rutas:hover .arrow-icon {
        transform: translateX(5px);
        color: white;
    }

    /* Animación de carga */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .ruta-card {
        animation: fadeInUp 0.6s ease forwards;
    }

    .ruta-card:nth-child(1) { animation-delay: 0.1s; }
    .ruta-card:nth-child(2) { animation-delay: 0.2s; }
    .ruta-card:nth-child(3) { animation-delay: 0.3s; }
    .ruta-card:nth-child(4) { animation-delay: 0.4s; }
    .ruta-card:nth-child(5) { animation-delay: 0.5s; }
    .ruta-card:nth-child(6) { animation-delay: 0.6s; }
    .ruta-card:nth-child(7) { animation-delay: 0.7s; }

    /* Estilos para el scroll personalizado */
    #botonesRuta::-webkit-scrollbar {
        width: 8px;
    }

    #botonesRuta::-webkit-scrollbar-track {
        background: rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    #botonesRuta::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
        border-radius: 10px;
    }

    #botonesRuta::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, #2980b9 0%, #1f5f8b 100%);
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .contenedor-principal {
            flex-direction: column;
        }

        .contenedor-botones {
            width: 100%;
            padding: 20px;
        }

        #map {
            height: 400px;
        }
    }

    /* Mejorar la experiencia de scroll */
    #botonesRuta {
        scrollbar-width: thin;
        scrollbar-color: #3498db rgba(0, 0, 0, 0.1);
    }
</style>

<script>
    var map;
    var userLocationMarker;
    var todosLosPuntos = @json($todosLosPuntos);
    var markers = [];
    var rutasPolylines = []; // Array para almacenar las líneas de las rutas
    var rutaActiva = null; // Variable para rastrear la ruta activa
    var markersPorRuta = {}; // Objeto para organizar marcadores por ruta

    // Función para inicializar el mapa
    function initMap() {
        // Configuración inicial del mapa con coordenadas temporales
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: { lat: 0, lng: 0 }, // Coordenadas temporales
            styles: [
                {
                    "featureType": "all",
                    "elementType": "geometry",
                    "stylers": [{"color": "#f5f5f5"}]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry",
                    "stylers": [{"color": "#ffffff"}]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [{"color": "#c9c9c9"}]
                }
            ]
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
                    title: 'Tu ubicación',
                    icon: {
                        url: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png',
                        scaledSize: new google.maps.Size(32, 32)
                    }
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

        // Inicializar el objeto markersPorRuta
        todosLosPuntos.forEach(function(punto) {
            if (!markersPorRuta[punto.ruta_id]) {
                markersPorRuta[punto.ruta_id] = [];
            }
        });

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
                case 4: // Ruta de la Línea 349
                    icono = 'http://maps.google.com/mapfiles/ms/icons/red-dot.png';
                    break;
                case 5: // Ruta de la Línea 983
                    icono = 'http://maps.google.com/mapfiles/ms/icons/purple-dot.png';
                    break;
                case 6: // Ruta de la Línea 267
                    icono = 'http://maps.google.com/mapfiles/ms/icons/orange-dot.png';
                    break;
                case 7: // Ruta de la Línea 304
                    icono = 'http://maps.google.com/mapfiles/ms/icons/pink-dot.png';
                    break;
                case 8: // Ruta de la Línea 387
                    icono = 'http://maps.google.com/mapfiles/ms/icons/pink-dot.png';
                    break;
                case 9: // Ruta de la Línea 830
                    icono = 'http://maps.google.com/mapfiles/ms/icons/pink-dot.png';
                    break;
                case 10: // Ruta de la Línea 880
                    icono = 'http://maps.google.com/mapfiles/ms/icons/pink-dot.png';
                    break;
                case 11: // Ruta de la Línea 847
                    icono = 'http://maps.google.com/mapfiles/ms/icons/pink-dot.png';
                    break;
                case 12: // Ruta de la Línea 930
                    icono = 'http://maps.google.com/mapfiles/ms/icons/pink-dot.png';
                    break;
                case 13: // Ruta de la Línea 906
                    icono = 'http://maps.google.com/mapfiles/ms/icons/pink-dot.png';
                    break;
                case 14: // Ruta de la Línea 984
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
                icon: {
                    url: icono,
                    scaledSize: new google.maps.Size(24, 24)
                }
            });

            // Agregar el marcador al array general
            markers.push(marker);

            // Agregar el marcador al array específico de la ruta
            markersPorRuta[punto.ruta_id].push(marker);
        });

        // Trazar todas las rutas después de crear los marcadores
        trazarTodasLasRutas();
    }

    // Función para trazar todas las rutas
    function trazarTodasLasRutas() {
        // Agrupar puntos por ruta
        const puntosPorRuta = {};
        todosLosPuntos.forEach(punto => {
            if (!puntosPorRuta[punto.ruta_id]) {
                puntosPorRuta[punto.ruta_id] = [];
            }
            puntosPorRuta[punto.ruta_id].push({
                lat: parseFloat(punto.latitud),
                lng: parseFloat(punto.longitud)
            });
        });

        // Trazar cada ruta
        Object.keys(puntosPorRuta).forEach(rutaId => {
            const puntos = puntosPorRuta[rutaId];
            const color = obtenerColorRuta(rutaId);

            const polyline = new google.maps.Polyline({
                path: puntos,
                geodesic: true,
                strokeColor: color,
                strokeOpacity: 0.8,
                strokeWeight: 4
            });

            polyline.setMap(map);
            rutasPolylines.push({
                id: parseInt(rutaId),
                polyline: polyline
            });
        });
    }

    // Función para obtener color según ruta
    function obtenerColorRuta(rutaId) {
        const colores = {
            1: '#00FF00', // Verde
            2: '#FFFF00', // Amarillo
            3: '#0000FF', // Azul
            4: '#FF0000', // Rojo
            5: '#800080', // Púrpura
            6: '#FFA500', // Naranja
            7: '#FFC0CB'  // Rosa
        };
        return colores[rutaId] || '#00FF00';
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
        console.log('Mostrando ruta:', rutaId);

        // Actualizar estado visual de las tarjetas
        actualizarEstadoTarjetas(rutaId);

        // Ocultar todos los marcadores en el mapa
        markers.forEach(function(marker) {
            marker.setVisible(false);
        });

        // Ocultar todas las rutas
        rutasPolylines.forEach(function(ruta) {
            ruta.polyline.setVisible(false);
        });

        // Mostrar los marcadores correspondientes a la ruta seleccionada
        if (markersPorRuta[rutaId]) {
            markersPorRuta[rutaId].forEach(function(marker) {
                marker.setVisible(true);
            });
        }

        // Mostrar la ruta correspondiente
        const rutaSeleccionada = rutasPolylines.find(ruta => ruta.id === parseInt(rutaId));
        if (rutaSeleccionada) {
            rutaSeleccionada.polyline.setVisible(true);
        }

        rutaActiva = rutaId;
    }

    // Función para mostrar todas las rutas
    function mostrarTodasLasRutas() {
        console.log('Mostrando todas las rutas');

        // Actualizar estado visual de las tarjetas
        actualizarEstadoTarjetas('todas');

        // Mostrar todos los marcadores
        markers.forEach(function(marker) {
            marker.setVisible(true);
        });

        // Mostrar todas las rutas
        rutasPolylines.forEach(function(ruta) {
            ruta.polyline.setVisible(true);
        });

        rutaActiva = 'todas';
    }

    // Función para actualizar el estado visual de las tarjetas
    function actualizarEstadoTarjetas(rutaId) {
        // Remover clase activa de todas las tarjetas
        document.querySelectorAll('.ruta-card').forEach(card => {
            card.classList.remove('active');
        });

        // Agregar clase activa a la tarjeta seleccionada
        if (rutaId === 'todas') {
            document.querySelector('.todas-las-rutas').classList.add('active');
        } else {
            const tarjetaSeleccionada = document.querySelector(`[data-ruta-id="${rutaId}"]`);
            if (tarjetaSeleccionada) {
                tarjetaSeleccionada.classList.add('active');
            }
        }
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