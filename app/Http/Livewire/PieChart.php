<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Infraccion;
use Illuminate\Support\Facades\DB;

class PieChart extends Component
{
    public $chartData;

    public function mount()
    {
        // Obtener el número de denuncias por tipo de infracción
        $infraccionesPorTipo = Infraccion::select(
                'tipoinfraccion',
                DB::raw('COUNT(*) as conteo')
            )
            ->groupBy('tipoinfraccion')
            ->orderBy('tipoinfraccion')
            ->get();

        // Obtener etiquetas y datos para el gráfico
        $labels = $infraccionesPorTipo->pluck('tipoinfraccion');
        $data = $infraccionesPorTipo->pluck('conteo');

        // Definir colores de fondo para las porciones del gráfico
        $backgroundColors = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0']; // Puedes agregar más colores según sea necesario

        // Construir los datos del gráfico en el formato adecuado
        $datasets = [
            [
                'label' => 'Denuncias',
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
        return view('livewire.pie-chart');
    }
}
