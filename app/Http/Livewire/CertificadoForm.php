<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Chofer; // Asegúrate de importar el modelo Chofer
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;

class CertificadoForm extends Component
{
    public $ci; // Campo para el CI
    public $chofer; // Para almacenar los datos del chofer
    public $certificadoContent; // Contenido del certificado

    protected $rules = [
        'ci' => 'required|exists:chofers,ci', // Validar que el CI exista en la tabla de choferes
    ];

    public function mount()
    {
        // Guardar la plantilla del certificado
        $this->certificadoContent = "Que revisado la documentación de ingreso a nuestra Institución evidenciamos que el señor [NOMBRES] [APELLIDOS] con C.I. [CI] es [TIPOSOCIO_ID] conductor el mismo que ingresó en fecha [FECHA_INGRESO].<br><br>
            En la actualidad el señor es [TIPOSOCIO_ID] de los vehículos Minibus con placa de control [MOVILIDAD_ID] .<br><br>
            El mencionado socio viene prestando sus servicios dentro del Sindicato de forma regular, no habiendo sido observado con relación a su conducta y responsabilidad.<br><br>
            Es lo que puedo certificar en honor a la verdad y a solicitud verbal del interesado para fines que en derecho le corresponda.<br><br>
            La presente certificación es solo y exclusivamente para trámite BANCARIO.";
    }


    public function buscarChofer()
    {
        $this->validate(); // Validar el CI

        // Buscar el chofer por su CI y cargar relaciones
        $this->chofer = Chofer::with(['movilidad', 'tiposocio'])->where('ci', $this->ci)->first();

        if ($this->chofer) {
            // Reemplazar los marcadores en la plantilla del certificado con los datos del chofer
            $contenidoCertificado = str_replace(
                ['[NOMBRES]', '[APELLIDOS]', '[CI]', '[FECHA_INGRESO]','[MOVILIDAD_ID]', '[TIPOSOCIO_ID]'],
                [
                    $this->chofer->nombres,
                    $this->chofer->apellidos,
                    $this->chofer->ci,
                    $this->chofer->fecha_ingreso,
                    $this->chofer->movilidad->placa ?? 'N/A',  // Mostrar el nombre de la movilidad si existe
                    $this->chofer->tiposocio->nombresocio ?? 'N/A'  // Mostrar el nombre del tipo de socio si existe
                ],
                $this->certificadoContent
            );

            // Actualizar el contenido del certificado
            $this->certificadoContent = $contenidoCertificado;
        }
    }

    public function generarPdf()
    {
        $this->validate([
            'certificadoContent' => 'required',
        ]);

        try {
            // Generar el PDF con el contenido del certificado
            $pdf = Pdf::loadView('pdf.certificado', [
                'contenidoCertificado' => $this->certificadoContent
            ])->setPaper('letter'); // Tamaño carta

            // Guardar el PDF y redirigir a la descarga
            $filePath = storage_path('app/public/certificado.pdf');
            $pdf->save($filePath);

            return redirect()->route('download-certificado'); // Asegúrate de tener la ruta de descarga
        } catch (\Exception $e) {
            Log::error('Error al generar el PDF: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.certificado-form');
    }
}
