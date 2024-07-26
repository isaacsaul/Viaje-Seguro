<div>
    <div>
        
    </div>

    <div style="background-color: white; padding: 2rem; border-radius: 0.5rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1), 0 2px 4px rgba(0, 0, 0, 0.1); width: 800px;">
        <form wire:submit.prevent="search">
            <div style="margin-bottom: 20px;">
                <label for="license-no" style="display: block; margin-bottom: 0.5rem;">No de Licencia</label>
                <input wire:model="licenseNo" id="license-no" type="text" placeholder="No de Licencia" style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem;">
            </div>
            <div style="margin-bottom: 20px;">
                <label for="plate" style="display: block; margin-bottom: 0.5rem;">Placa de movilidad</label>
                <input wire:model="plate" id="plate" type="text" placeholder="Placa de movilidad" style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 0.25rem;">
            </div>
            <div style="display: flex; justify-content: center;">
                <button type="submit" style="background-color: #3b82f6; color: #ffffff; padding: 0.5rem 1rem; border: none; border-radius: 0.25rem;">Buscar</button>
            </div>
        </form>
    </div>

    <!-- Aquí se mostrarán los datos recibidos -->
    <div id="resultados" style="margin-top: 20px;">
        <!-- Los resultados se mostrarán aquí -->
    </div>

    <style>
        .tabla-datos {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        .tabla-datos th,
        .tabla-datos td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        .tabla-datos th {
            background-color: #f2f2f2;
        }

        .seccion-titulo {
            margin-top: 30px;
            margin-bottom: 10px;
            font-size: 1.2rem;
            font-weight: bold;
        }
    </style>

    <script>
        window.addEventListener('form-submitted', event => {
            let data = JSON.parse(event.detail.data);
            let resultadosDiv = document.getElementById('resultados');

            if (data.length > 0) {
                let html = '<h2>Resultados de la búsqueda:</h2>';

                data.forEach(item => {
                    // Sección Datos de infracción
                    html += '<div class="seccion-titulo">Datos de infracción</div>';
                    html += '<table class="tabla-datos">';
                    html += '<tr><th>ID de Infracción</th><td>' + item.id + '</td></tr>';
                    html += '<tr><th>Tipo de Infracción</th><td>' + item.tipoinfraccion + '</td></tr>';
                    html += '<tr><th>Fecha de Infracción</th><td>' + item.fechainfraccion + '</td></tr>';
                    html += '<tr><th>Estado</th><td>' + item.estado + '</td></tr>';
                    html += '</table>';

                    // Sección Datos de sanción
                    html += '<div class="seccion-titulo">Datos de sanción</div>';
                    html += '<table class="tabla-datos">';
                    html += '<tr><th>ID de Sanción</th><td>' + item.id_sancion + '</td></tr>';
                    html += '<tr><th>Tipo de Sanción</th><td>' + item.tiposancion + '</td></tr>';
                    html += '<tr><th>Descripción de Sanción</th><td>' + item.descripcion + '</td></tr>';
                    html += '</table>';

                    // Sección Datos del chofer
                    html += '<div class="seccion-titulo">Datos del chofer</div>';
                    html += '<table class="tabla-datos">';
                    html += '<tr><th>ID de Chofer</th><td>' + item.chofer_id + '</td></tr>';
                    html += '<tr><th>CI de Chofer</th><td>' + item.ci + '</td></tr>';
                    html += '<tr><th>Correo de Chofer</th><td>' + item.correo + '</td></tr>';
                    html += '<tr><th>Nombres de Chofer</th><td>' + item.nombres + '</td></tr>';
                    html += '<tr><th>Apellidos de Chofer</th><td>' + item.apellidos + '</td></tr>';
                    html += '<tr><th>Fecha de Ingreso de Chofer</th><td>' + item.fecha_ingreso + '</td></tr>';
                    html += '<tr><th>Celular de Chofer</th><td>' + item.celular + '</td></tr>';
                    html += '<tr><th>Estado Civil de Chofer</th><td>' + item.estado_civil + '</td></tr>';
                    html += '<tr><th>No de Domicilio de Chofer</th><td>' + item.no_domicilio + '</td></tr>';
                    html += '<tr><th>Barrio de Domicilio de Chofer</th><td>' + item.barrio_domicilio + '</td></tr>';
                    html += '<tr><th>Ciudad de Chofer</th><td>' + item.ciudad + '</td></tr>';
                    html += '<tr><th>No de Licencia de Chofer</th><td>' + item.no_licencia + '</td></tr>';
                    html += '<tr><th>Lugar de Nacimiento de Chofer</th><td>' + item.lugar_nacimiento + '</td></tr>';
                    html += '<tr><th>ID de Movilidad de Chofer</th><td>' + item.movilidad_id + '</td></tr>';
                    html += '<tr><th>ID de Tipo de Socio de Chofer</th><td>' + item.tiposocio_id + '</td></tr>';
                    html += '</table>';

                    // Sección Datos de movilidad
                    html += '<div class="seccion-titulo">Datos de movilidad</div>';
                    html += '<table class="tabla-datos">';
                    html += '<tr><th>ID de Movilidad</th><td>' + item.id + '</td></tr>';
                    html += '<tr><th>Placa de Movilidad</th><td>' + item.placa + '</td></tr>';
                    html += '<tr><th>Color de Movilidad</th><td>' + item.color + '</td></tr>';
                    html += '<tr><th>Marca de Movilidad</th><td>' + item.marca + '</td></tr>';
                    html += '<tr><th>Modelo de Movilidad</th><td>' + item.modelo + '</td></tr>';
                    html += '<tr><th>Capacidad de Movilidad</th><td>' + item.capacidad + '</td></tr>';
                    html += '<tr><th>No de SOAT de Movilidad</th><td>' + item.no_soat + '</td></tr>';
                    html += '<tr><th>ID de Línea de Movilidad</th><td>' + item.linea_id + '</td></tr>';
                    html += '</table>';

                    html += '<hr>'; // Separador entre cada conjunto de datos
                });

                resultadosDiv.innerHTML = html;
            } else {
                resultadosDiv.innerHTML = '<p>No se encontraron datos para los criterios de búsqueda.</p>';
            }
        });
    </script>
</div>
