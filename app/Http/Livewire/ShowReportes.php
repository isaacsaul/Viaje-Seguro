<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PuntosRuta;
use App\Models\Ruta;

class ShowReportes extends Component
{
    public function render()
    {
        // Obtener todos los puntos de ruta
        $todosLosPuntos = PuntosRuta::all();

        // Obtener todas las rutas
        $rutas = Ruta::all();

        return view('livewire.show-reportes', [
            'todosLosPuntos' => $todosLosPuntos,
            'rutas' => $rutas
        ]);
    }
}

