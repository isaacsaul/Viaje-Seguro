<?php


namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class RoutesHeatmap extends Component
{
    public $heatmapData;

    public function mount()
    {
        // Ejemplo de cómo cargar datos desde la base de datos
        $this->heatmapData = DB::table('denuncias')
            ->select('latitud', 'longitud')
            ->get()
            ->map(function ($item) {
                return [$item->latitud, $item->longitud];
            })
            ->toArray();
    }

    public function render()
    {
        return view('livewire.routes-heatmap');
    }
}

