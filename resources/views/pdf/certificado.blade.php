<!DOCTYPE html>
<html>
<head>
    <title>Certificado</title>
    <style>
        body {
            font-family: 'Batang', sans-serif; /* Usa Batang en lugar de Arial */
            margin: 0;
            padding: 0;
            background: white;
        }
        .container {
            margin: 0 auto;
            padding: 20px;
            max-width: 800px;
            background: white;
            border-radius: 8px;
        }
        .header, .footer {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            max-width: 100px;
        }
        .content {
            text-align: justify;
        }
        .content p {
            margin: 10px 0;
        }
        .signature {
            margin-top: 50px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="container" style="padding-left: 150px; padding-right:50px; padding-top:150px">
        <div class="header">
            <h3 style="font-size: 1.3em;">EL SUSCRITO SECRETARIO GENERAL DEL SINDICATO MIXTO DE TRANSPORTES "SIMÓN BOLÍVAR"</h3>
        </div>
        <div class="content">
            <h1 style="padding-left:150px;">CERTIFICA:</h1>
            <p>{!! $contenidoCertificado !!}</p>
        </div>
        <div class="footer">
            <p>Es dado en la ciudad de La Paz a los {{ \Carbon\Carbon::now()->day }} días del mes de {{ \Carbon\Carbon::now()->locale('es')->translatedFormat('F') }} del año {{ \Carbon\Carbon::now()->year }}.</p>
        </div>
        <div class="signature">
            {{-- <p>____________________________</p>
            <p>Firma</p> --}}
        </div>
    </div>
</body>
</html>
