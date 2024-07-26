<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Infraccion;
use Illuminate\Support\Facades\DB;

class ReportChart extends Component
{
    public $chartData;

    public function mount()
    {
        $this->loadChartData();
    }

    public function loadChartData()
    {
        // Obtener el número de infracciones por mes
        $infraccionesPorMes = Infraccion::select(
                DB::raw('MONTH(fechainfraccion) as mes'),
                DB::raw('COUNT(*) as conteo')
            )
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        // Mapear los resultados para Chart.js
        $labels = $infraccionesPorMes->pluck('mes')->map(function ($mes) {
            return date('F', mktime(0, 0, 0, $mes, 10)); // Convertir el número del mes al nombre del mes
        });
        $data = $infraccionesPorMes->pluck('conteo');

        $this->chartData = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Denuncias',
                    'backgroundColor' => '#42A5F5',
                    'data' => $data
                ]
            ]
        ];
    }

    public function render()
    {
        return view('livewire.report-chart');
    }
}
