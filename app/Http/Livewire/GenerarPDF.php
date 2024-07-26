<?php

namespace App\Http\Livewire;

use Livewire\Component;
use PDF;
use Log;

class GenerarPDF extends Component
{
    public function render()
    {
        return view('livewire.generar-p-d-f');
    }

    public function generatePDF()
    {
        Log::info('Intentando generar el PDF.');

        // Generar el PDF utilizando Dompdf
        $pdf = PDF::loadView('livewire.generar-p-d-f', [
            'content' => '<p>Este es un ejemplo de contenido para el PDF generado directamente desde el controlador Livewire.</p>'
        ]);

        // Descargar el PDF con un nombre específico
        return $pdf->download('reporte.pdf');
    }
}
