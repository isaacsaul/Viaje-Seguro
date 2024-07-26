<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class RadarChart extends Component
{
    public $chartData;

    public function mount()
    {
        // Ejemplo de cómo cargar datos desde la base de datos
        $this->chartData = [
            'labels' => ['Enero', 'Febrero', 'Marzo', 'Abril', 'Marzo', 'Abril'],
            'datasets' => [
                [
                    'label' => 'Denuncias',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'data' => [65, 59, 40, 81, 48, 81]
                ]
            ]
        ];
    }

    public function render()
    {
        return view('livewire.radar-chart');
    }
}

