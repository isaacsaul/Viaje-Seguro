<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sancion;
use Illuminate\Support\Facades\DB;

class DoughnutChart extends Component
{
    public $chartData;

    public function mount()
    {
        // Obtener el número de sanciones por tipo de sanción
        $sancionesPorTipo = Sancion::select(
                'tiposancion',
                DB::raw('COUNT(*) as conteo')
            )
            ->groupBy('tiposancion')
            ->orderBy('tiposancion')
            ->get();

        // Obtener etiquetas y datos para el gráfico
        $labels = $sancionesPorTipo->pluck('tiposancion');
        $data = $sancionesPorTipo->pluck('conteo');

        // Definir colores de fondo para las porciones del gráfico
        $backgroundColors = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0']; // Puedes agregar más colores según sea necesario

        // Construir los datos del gráfico en el formato adecuado
        $datasets = [
            [
                'label' => 'Sanciones',
                'backgroundColor' => $backgroundColors,
                'data' => $data
            ]
        ];

        $this->chartData = [
            'labels' => $labels,
            'datasets' => $datasets
        ];
    }

    public function render()
    {
        return view('livewire.doughnut-chart');
    }
}
