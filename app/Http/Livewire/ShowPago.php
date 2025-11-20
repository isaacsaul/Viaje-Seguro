<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Chofer;
use App\Models\Pago;
use Carbon\Carbon;

class ShowPago extends Component
{
    use WithPagination;

    public $yearRange; // Año seleccionado
    public $ci; // Usar CI en lugar de carnet
    public $perPage = 5; // Número de registros por página
    public $totalWeeks = 52; // Número total de semanas (52 semanas por año)

    public function mount()
    {
        // Establecer el año por defecto al año actual
        $this->yearRange = Carbon::now()->year;
    }

    public function updatedYearRange()
    {
        $this->resetPage(); // Reiniciar la página al cambiar el año
    }

    public function getYearRangesProperty()
    {
        $currentYear = Carbon::now()->year; // Año actual
        $startYear = $currentYear - 5; // Año de inicio (por ejemplo, 5 años antes del año actual)
        $yearRanges = [];

        for ($i = 0; $i < 10; $i++) {
            $yearRanges[] = (string)($startYear + $i);
        }

        return $yearRanges;
    }

    public function render()
    {
        // Obtener choferes filtrados por CI
        $query = Chofer::query();

        if ($this->ci) {
            $query->where('ci', $this->ci);
        }

        $choferes = $query->paginate($this->perPage);

        // Crear un array para almacenar el estado de los pagos por semana
        $paymentStatus = [];
        $missedPayments = []; // Array para almacenar el conteo de pagos no realizados

        $year = $this->yearRange;
        $startDate = Carbon::createFromDate($year, 1, 1)->startOfWeek();
        $endDate = $startDate->copy()->addWeeks($this->totalWeeks - 1)->endOfWeek(); // Final del año

        // Obtener todos los pagos del año de una vez para evitar consultas repetidas
        $pagos = Pago::whereBetween('fecha', [$startDate, $endDate])
            ->whereYear('fecha', $year)
            ->get()
            ->groupBy(function ($pago) {
                return Carbon::parse($pago->fecha)->weekOfYear;
            });

        foreach ($choferes as $chofer) {
            $paymentStatus[$chofer->id] = [];
            $missedPayments[$chofer->id] = 0; // Inicializar el conteo

            $startDate = Carbon::createFromDate((int)$this->yearRange, 1, 1)->startOfWeek(); // Convertir $year a entero

            for ($week = 1; $week <= $this->totalWeeks; $week++) {
                $startOfWeek = $startDate->copy()->startOfWeek();
                $endOfWeek = $startDate->copy()->endOfWeek();

                // Aquí obtenemos los pagos de la semana en lugar de hacer una consulta nueva
                $weeklyPayments = $pagos->get($week, collect());

                $pago = $weeklyPayments->where('ci', $chofer->ci)->sortByDesc('fecha')->first();

                if ($pago) {
                    $paymentStatus[$chofer->id][$week] = $pago->No_serial;
                } else {
                    $paymentStatus[$chofer->id][$week] = '✘';
                    $missedPayments[$chofer->id]++;
                }

                // Avanzar a la siguiente semana
                $startDate->addWeek();
            }
        }

        return view('livewire.show-pago', [
            'choferes' => $choferes,
            'paymentStatus' => $paymentStatus,
            'missedPayments' => $missedPayments,
            'totalWeeks' => $this->totalWeeks,
            'yearRanges' => $this->yearRanges // Pasar los años a la vista
        ]);
    }
}
