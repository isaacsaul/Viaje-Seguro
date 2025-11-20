<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Infraccion;
use Barryvdh\DomPDF\Facade\Pdf; // Asegúrate de importar la biblioteca de PDF
use Illuminate\Support\Facades\Log;

class ShowUsuarios extends Component
{
    public $licenseNo;
    public $plate;
    public $infracciones = []; // Para almacenar los resultados de la búsqueda

    public function search()
    {
        // Realizar la consulta usando Eloquent
        $this->infracciones = Infraccion::select('infraccions.*', 'chofers.*', 'movilidads.*', 'sancions.*')
            ->join('chofers', 'infraccions.chofer_id', '=', 'chofers.id')
            ->join('movilidads', 'chofers.movilidad_id', '=', 'movilidads.id')
            ->join('sancions', 'infraccions.id_sancion', '=', 'sancions.id')
            ->where('chofers.no_licencia', $this->licenseNo)
            ->where('movilidads.placa', $this->plate)
            ->get();

        // Enviar los datos al evento del navegador como JSON
        $this->dispatchBrowserEvent('form-submitted', [
            'data' => $this->infracciones->toJson()
        ]);
    }

    public function generarPdf()
    {
        // Validar que haya infracciones para incluir en el PDF
        if ($this->infracciones->isEmpty()) {
            session()->flash('message', 'No hay infracciones para mostrar en el PDF.');
            return;
        }

        Log::info('Generando PDF con infracciones...');

        try {
            $pdf = Pdf::loadView('pdf.infracciones', [
                'infracciones' => $this->infracciones,
            ])
            ->setPaper('letter');

            $filePath = storage_path('app/public/infracciones.pdf');
            $pdf->save($filePath);
            Log::info('PDF guardado con éxito.');

            return response()->download($filePath)->deleteFileAfterSend(true); // Descargar el PDF y eliminar el archivo
        } catch (\Exception $e) {
            Log::error('Error al generar el PDF:', ['exception' => $e->getMessage()]);
            throw $e;
        }
    }

    public function render()
    {
        return view('livewire.show-usuarios');
    }
}
