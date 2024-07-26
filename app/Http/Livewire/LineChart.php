<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class LineChart extends Component
{
    public $chartData;

    public function mount()
    {
        // Consulta SQL para obtener el conteo de infracciones por línea
        $infraccionesPorLinea = DB::select("
            SELECT l.codigo AS lineas, COUNT(i.id) AS conteo_infracciones
            FROM chofers c
            JOIN movilidads m ON c.movilidad_id = m.id
            JOIN lineas l ON m.linea_id = l.id
            LEFT JOIN infraccions i ON c.id = i.chofer_id
            GROUP BY l.codigo
        ");

        // Preparar los datos para el gráfico
        $labels = [];
        $data = [];

        foreach ($infraccionesPorLinea as $infraccion) {
            $labels[] = $infraccion->lineas;
            $data[] = $infraccion->conteo_infracciones;
        }

        // Configurar los datos del gráfico
        $this->chartData = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Denuncias',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'data' => $data
                ]
            ]
        ];
    }

    public function render()
    {
        return view('livewire.line-chart');
    }
}
