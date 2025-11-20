<!DOCTYPE html>
<html>
<head>
    <title>Infracciones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        .seccion-titulo {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Lista de Infracciones</h1>

    @foreach ($infracciones as $item)
        <div class="seccion-titulo">Datos del chofer</div>
        <table>
            <tr><th>CI de Chofer</th><td>{{ $item->ci }}</td></tr>
            <tr><th>Correo de Chofer</th><td>{{ $item->correo }}</td></tr>
            <tr><th>Nombres de Chofer</th><td>{{ $item->nombres }}</td></tr>
            <tr><th>Apellidos de Chofer</th><td>{{ $item->apellidos }}</td></tr>
            <tr><th>Fecha de Ingreso de Chofer</th><td>{{ $item->fecha_ingreso }}</td></tr>
            <tr><th>Celular de Chofer</th><td>{{ $item->celular }}</td></tr>
            <tr><th>No de Licencia de Chofer</th><td>{{ $item->no_licencia }}</td></tr>
        </table>

        <div class="seccion-titulo">Datos de movilidad</div>
        <table>
            <tr><th>Placa de Movilidad</th><td>{{ $item->placa }}</td></tr>
            <tr><th>Color de Movilidad</th><td>{{ $item->color }}</td></tr>
            <tr><th>Marca de Movilidad</th><td>{{ $item->marca }}</td></tr>
            <tr><th>No de SOAT de Movilidad</th><td>{{ $item->no_soat }}</td></tr>
        </table>

        <div class="seccion-titulo">Datos de infracción</div>
        <table>
            <tr><th>Tipo de Infracción</th><td>{{ $item->tipoinfraccion }}</td></tr>
            <tr><th>Fecha de Infracción</th><td>{{ $item->fechainfraccion }}</td></tr>
            <tr><th>Estado</th><td>{{ $item->estado }}</td></tr>
        </table>

        <div class="seccion-titulo">Datos de sanción</div>
        <table>
            <tr><th>Tipo de Sanción</th><td>{{ $item->tiposancion }}</td></tr>
            <tr><th>Descripción de Sanción</th><td>{{ $item->descripcion }}</td></tr>
        </table>

        <hr>
    @endforeach
</body>
</html>
