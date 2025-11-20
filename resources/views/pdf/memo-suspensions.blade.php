<!DOCTYPE html>
<html>
<head>
    <title>Memo de Suspensión</title>
</head>
<body>
    <div style="font-family: 'Arial', sans-serif; margin: 0; padding: 0; background: white;">
        <div style="margin: 0 auto; padding: 20px; max-width: 800px; background: white; border-radius: 5px;">
            <div style="margin-top: -50px" class="header">
                <div style="margin-left: 550px">
                    <p>&nbsp;&nbsp;&nbsp; {{ $numeroSerie }}</p>
                </div>
                <div style="margin-left: 340px">
                    <p style="padding-right: 50px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $chofer->nombres }} {{ $chofer->apellidos}}</p>
                </div>
                <div style="margin-top:20px">
                    <p style="padding-left: 30px"> {{ \Carbon\Carbon::now()->format('d') }}  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   {{ \Carbon\Carbon::now()->locale('es')->translatedFormat('F') }} &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;  {{ \Carbon\Carbon::now()->year }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; C.I {{ $chofer->ci }} del {{ $chofer->movilidad->linea->grupo->codgrupo }}</p>
                </div>
            </div>
            <div class="content">
                <h3 style="text-align: center">SUSPENSIÓN POR TIEMPO INDEFINIDO</h3>
                <p style="text-align: justify">{!! nl2br($parrafo) !!}</p>
            </div>

            <div style="
        font-family: monospace; /* Usa una fuente de ancho fijo para alinear los caracteres */
        white-space: pre; /* Mantiene el formato de los espacios en blanco */
        margin: 0;
        padding: 20px;
        text-align: center;
    ">
        <div style="
            font-size: 10px; /* Tamaño de fuente más pequeño */
            line-height: 1.2;
            display: inline-block; /* Mantiene el rectángulo ajustado al contenido */
            padding: 10px;
            width: 100%;
            table-layout: fixed;
        ">
            <table style="
                width: 100%;
                border-collapse: collapse;
            ">
                @foreach(array_chunk($firmas, 3) as $fila)
                    <tr>
                        @foreach($fila as $firma)
                            <td style="
                                padding: 5px;
                                text-align: center;
                                vertical-align: top;
                            ">
                                <p style="
                                    margin: -2px;
                                    padding: -2px;
                                ">{{ $firma['nombre'] }}</p>
                                <p style="
                                    margin: -2px;
                                    padding: -2px;margin-top:-10px;
                                ">{{ $firma['cargo'] }}</p>
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
        </div>
    </div>
</body>
</html>
