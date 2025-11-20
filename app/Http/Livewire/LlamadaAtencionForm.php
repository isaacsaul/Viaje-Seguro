<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use App\Models\Chofer; // Cambiado a Chofer

class LlamadaAtencionForm extends Component
{
    public $carnet;
    public $chofer; // Cambiado de $registro a $chofer
    public $parrafo;
    public $numeroSerie = 'SSB/0001/2024';
    public $selectedFirmas = []; // Firmas seleccionadas por el usuario
    public $firmas = [
        ['numero' => 0, 'nombre' => 'SANTOS CHUQUIMIA YUJRA', 'cargo' => 'STRIO. GENERAL'],
        ['numero' => 1, 'nombre' => 'EDWIN QUISPE MENA', 'cargo' => 'STRIO. RELACIONES'],
        ['numero' => 2, 'nombre' => 'FELIX CHIPANA OCHOA', 'cargo' => 'STRIO. HACIENDA'],
        ['numero' => 3, 'nombre' => 'JHONNY MAMANI HUAYCHO', 'cargo' => 'STRIO. CONFLICTOS EL ALTO'],
        ['numero' => 4, 'nombre' => 'RAMIRO QUISBERT RAMOS', 'cargo' => 'STRIO. CONFLICTOS LA PAZ'],
        ['numero' => 5, 'nombre' => 'OMAR ALVAREZ ATAWACHI', 'cargo' => 'STRIO. REGIMEN INTERNO MASIVO'],
        ['numero' => 6, 'nombre' => 'EDGAR QUISPE COPA', 'cargo' => 'STRIO. REGIMEN INTERNO SELECTIVO'],
        ['numero' => 7, 'nombre' => 'ERNESTO HEREDIA', 'cargo' => 'INSPECTOR GENERAL'],
        ['numero' => 8, 'nombre' => 'CESAR BLANCO QUISPE', 'cargo' => 'STRIO. DEPORTES'],
    ];

    protected $rules = [
        'carnet' => 'required|exists:chofers,ci', // Cambiado de registros a choferes
        'parrafo' => 'required|string',
        'selectedFirmas' => 'array',
    ];

    public function mount()
    {
        $this->parrafo = "Compañero:\n
        Por la presente se le comunica al compañero a respetar a los compañeros de acuerdo al orden de salida y llegada de los vehículos. Quedando terminantemente prohibido los correteos; en caso de no tomar nota, se procederá a las sanciones correspondientes.\n
        Nota: de no acatar la presente llamada de atención, se procederá a sanciones más drásticas.
        Con este motivo, saludamos a usted muy atentamente.";
    }


    public function buscarChofer()
    {
        $this->validate();
        $this->chofer = Chofer::with('movilidad.linea.grupo')->where('ci', $this->carnet)->first(); // Carga las relaciones necesarias
        Log::info('Chofer encontrado:', ['chofer' => $this->chofer]);
    }

    public function generarPdf()
    {
        $this->validate([
            'chofer' => 'required',
            'parrafo' => 'required|string',
            'selectedFirmas' => 'array',
        ]);

        Log::info('Generando PDF...', ['chofer' => $this->chofer, 'parrafo' => $this->parrafo]);

        try {
            // Crear el diccionario de meses
            $mesesEnEspanol = [
                'January' => 'Enero',
                'February' => 'Febrero',
                'March' => 'Marzo',
                'April' => 'Abril',
                'May' => 'Mayo',
                'June' => 'Junio',
                'July' => 'Julio',
                'August' => 'Agosto',
                'September' => 'Septiembre',
                'October' => 'Octubre',
                'November' => 'Noviembre',
                'December' => 'Diciembre',
            ];

            // Obtener el nombre del mes en inglés y traducirlo
            $fechaIngreso = Carbon::parse($this->chofer->fecha_ingreso);
            $mesEnIngles = $fechaIngreso->format('F');
            $mesEnEspanol = $mesesEnEspanol[$mesEnIngles] ?? $mesEnIngles;

            // Formatear la fecha en español
            $fechaFormato = $fechaIngreso->format('d \\d\\e ') . $mesEnEspanol . $fechaIngreso->format(' \\d\\e Y');

            // Filtrar las firmas seleccionadas
            $firmasSeleccionadas = array_filter($this->firmas, function($firma) {
                return in_array($firma['nombre'], $this->selectedFirmas);
            });
            $pdf = Pdf::loadView('pdf.llamada-atencion', [
                'chofer' => $this->chofer,
                'parrafo' => $this->parrafo,
                'fechaIngreso' => $fechaFormato,
                'numeroSerie' => $this->numeroSerie,
                'selectedFirmas' => $this->selectedFirmas, // Pasar las firmas seleccionadas al PDF
                'firmas' => $firmasSeleccionadas, // Solo pasar las firmas seleccionadas
            ])
            ->setPaper('letter');

            $filePath = storage_path('app/public/llamada-atencion.pdf');
            $pdf->save($filePath);
            Log::info('PDF guardado con éxito.');

            return redirect()->route('download-llamada-atencion');
        } catch (\Exception $e) {
            Log::error('Error al generar el PDF:', ['exception' => $e->getMessage()]);
            throw $e;
        }
    }
    public function render()
    {
        return view('livewire.llamada-atencion-form');
    }
}
