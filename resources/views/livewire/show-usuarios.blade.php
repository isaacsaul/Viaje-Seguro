<div>
   <!-- Formulario de búsqueda -->
   <div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-xl shadow-lg p-8 mb-8 transform transition-all duration-300 hover:shadow-xl">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Búsqueda de Infracciones</h2>
        <form wire:submit.prevent="search" class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="relative">
                    <label for="license-no" class="block text-sm font-medium text-gray-700 mb-2">
                        No de Licencia
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4z"/>
                            </svg>
                        </div>
                        <input
                            wire:model="licenseNo"
                            id="license-no"
                            type="text"
                            placeholder="Ingrese el No de Licencia"
                            class="pl-10 block w-full rounded-lg border-gray-300 bg-gray-50 focus:border-blue-500 focus:ring-blue-500 transition duration-150"
                        >
                    </div>
                </div>

                <div class="relative">
                    <label for="plate" class="block text-sm font-medium text-gray-700 mb-2">
                        Placa de Movilidad
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <input
                            wire:model="plate"
                            id="plate"
                            type="text"
                            placeholder="Ingrese la Placa de la Movilidad"
                            class="pl-10 block w-full rounded-lg border-gray-300 bg-gray-50 focus:border-blue-500 focus:ring-blue-500 transition duration-150"
                        >
                    </div>
                </div>
            </div>

            <div class="flex justify-center mt-6">
                <button
                    type="submit"
                    class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150"
                >
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    Buscar
                </button>
            </div>
        </form>
    </div>

    <div id="resultados" style="margin-top: 20px; display: flex; flex-wrap: wrap; gap: 20px; justify-content: space-between;">
        <!-- Los resultados se mostrarán aquí -->
    </div>

    <style>
        .tabla-datos {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
        }

        .tabla-datos th,
        .tabla-datos td {
            border: 1px solid #d1d5db;
            padding: 12px;
            text-align: left;
        }

        .tabla-datos th {
            background-color: #f3f4f6;
            color: #1f2937;
            font-weight: bold;
        }

        .tabla-datos td {
            color: #374151;
            background-color: #f9fafb;
        }

        .seccion-titulo {
            margin-top: 20px;
            margin-bottom: 10px;
            font-size: 1.2rem;
            font-weight: bold;
            color: #1f2937;
        }

        .card {
            background-color: #ffffff;
            border-radius: 0.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            flex: 1 1 calc(48% - 20px); /* Permitir que las tarjetas crezcan y se reduzcan, ocupando el 48% del ancho */
            box-sizing: border-box; /* Incluir el padding en el cálculo del ancho */
        }

        hr {
            border: 0;
            border-top: 1px solid #e5e7eb;
            margin: 30px 0;
        }

        #resultados h2 {
            color: #1f2937;
            font-size: 1.5rem;
            margin-bottom: 1rem;
            text-align: center;
            width: 100%; /* Para que el título ocupe todo el ancho */
        }

        #resultados p {
            color: #6b7280;
            font-size: 1rem;
            text-align: center;
        }
    </style>

<script>
    window.addEventListener('form-submitted', event => {
        let data = JSON.parse(event.detail.data);
        let resultadosDiv = document.getElementById('resultados');

        // Limpiar los resultados anteriores
        resultadosDiv.innerHTML = '';

        if (data.length > 0) {
            let html = ''; // Inicializar el contenedor de resultados

            let choferDataMostrado = false;
            let movilidadDataMostrada = false; // Variable para controlar la repetición de datos de movilidad

            data.forEach(item => {
                if (!choferDataMostrado) {
                    html += '<div class="card"><div class="seccion-titulo">Datos del chofer</div>';
                    html += '<table class="tabla-datos">';
                    html += '<tr><th>CI de Chofer</th><td>' + item.ci + '</td></tr>';
                    html += '<tr><th>Correo de Chofer</th><td>' + item.correo + '</td></tr>';
                    html += '<tr><th>Nombres de Chofer</th><td>' + item.nombres + '</td></tr>';
                    html += '<tr><th>Apellidos de Chofer</th><td>' + item.apellidos + '</td></tr>';
                    html += '<tr><th>Fecha de Ingreso de Chofer</th><td>' + item.fecha_ingreso + '</td></tr>';
                    html += '<tr><th>Celular de Chofer</th><td>' + item.celular + '</td></tr>';
                    html += '<tr><th>No de Licencia de Chofer</th><td>' + item.no_licencia + '</td></tr>';
                    html += '</table></div>';
                    choferDataMostrado = true;
                }

                // Datos de movilidad (solo si no se ha mostrado)
                if (!movilidadDataMostrada) {
                    html += '<div class="card"><div class="seccion-titulo">Datos de movilidad</div>';
                    html += '<table class="tabla-datos">';
                    html += '<tr><th>Placa de Movilidad</th><td>' + item.placa + '</td></tr>';
                    html += '<tr><th>Color de Movilidad</th><td>' + item.color + '</td></tr>';
                    html += '<tr><th>Marca de Movilidad</th><td>' + item.marca + '</td></tr>';
                    html += '<tr><th>No de SOAT de Movilidad</th><td>' + item.no_soat + '</td></tr>';
                    html += '</table></div>';
                    movilidadDataMostrada = true; // Marcar que ya se han mostrado los datos de movilidad
                }

                // Datos de infracción
                html += '<div class="card"><div class="seccion-titulo">Datos de infracción</div>';
                html += '<table class="tabla-datos">';
                html += '<tr><th>Tipo de Infracción</th><td>' + item.tipoinfraccion + '</td></tr>';
                html += '<tr><th>Fecha de Infracción</th><td>' + item.fechainfraccion + '</td></tr>';
                html += '<tr><th>Estado</th><td>' + item.estado + '</td></tr>';
                html += '</table></div>';

                // Datos de sanción
                html += '<div class="card"><div class="seccion-titulo">Datos de sanción</div>';
                html += '<table class="tabla-datos">';
                html += '<tr><th>Tipo de Sanción</th><td>' + item.tiposancion + '</td></tr>';
                html += '<tr><th>Descripción de Sanción</th><td>' + item.descripcion + '</td></tr>';
                html += '</table></div>';

                html += '<hr>';
            });

            resultadosDiv.innerHTML += html; // Agregar resultados al contenedor existente
        } else {
            resultadosDiv.innerHTML = '<p>No se encontraron datos para los criterios de búsqueda.</p>';
        }
    });
</script>


</div>
