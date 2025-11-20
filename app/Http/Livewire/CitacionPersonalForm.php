<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use App\Models\Chofer; // Cambiado a Chofer

class CitacionPersonalForm extends Component
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
        El Directorio CITA A SU PERSONA para resolver una denuncia en contra de: XXX. Para el día martes O de octubre del presente año a horas 17:15 en oficinas de nuestra institución.\n
        Debemos mencipnar que de no acatar el presente memorándum nos veremos obligados a tomar medidas mas drásticas que el caso aconseje.\n
        Con este motivo saludo a usted muy atentamente.";
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
            'chofer' => 'required', // Cambiado de registro a chofer
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
            $fechaIngreso = Carbon::parse($this->chofer->fecha_ingreso); // Cambiado de registro a chofer
            $mesEnIngles = $fechaIngreso->format('F');
            $mesEnEspanol = $mesesEnEspanol[$mesEnIngles] ?? $mesEnIngles;

            // Formatear la fecha en español
            $fechaFormato = $fechaIngreso->format('d \\d\\e ') . $mesEnEspanol . $fechaIngreso->format(' \\d\\e Y');

            // Filtrar las firmas seleccionadas
            $firmasSeleccionadas = array_filter($this->firmas, function($firma) {
                return in_array($firma['nombre'], $this->selectedFirmas);
            });

            $pdf = Pdf::loadView('pdf.citacion-personal', [
                'chofer' => $this->chofer, // Cambiado de registro a chofer
                'parrafo' => $this->parrafo,
                'fechaIngreso' => $fechaFormato,
                'numeroSerie' => $this->numeroSerie,
                'firmas' => $firmasSeleccionadas, // Pasar solo las firmas seleccionadas al PDF
            ])
            ->setPaper('letter');

            $filePath = storage_path('app/public/citacion-personal.pdf');
            $pdf->save($filePath);
            Log::info('PDF guardado con éxito.');

            return redirect()->route('download-citacion-personal');
        } catch (\Exception $e) {
            Log::error('Error al generar el PDF:', ['exception' => $e->getMessage()]);
            throw $e;
        }
    }

    public function render()
    {
        return view('livewire.citacion-personal-form');
    }
}
