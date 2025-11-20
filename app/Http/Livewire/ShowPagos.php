<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pago;

class ShowPagos extends Component
{
    public $search;
    public $sort = "id";
    public $direction = "desc";
    public $showDeleted = false; // Añade una propiedad para mostrar registros eliminados

    protected $listeners = ['render', 'delete', 'restore'];

    public function render()
    {
        $query = Pago::query();

        if ($this->showDeleted) {
            // Mostrar solo registros eliminados
            $query->onlyTrashed();
        } else {
            // Mostrar solo registros activos
            $query->whereNull('deleted_at');
        }

        $pagos = $query->where(function($query) {
                                $query->where('No_serial', 'like', '%' . $this->search . '%')
                                      ->orWhere('fecha', 'like', '%' . $this->search . '%')
                                      ->orWhere('ci', 'like', '%' . $this->search . '%');
                            })
                            ->orderBy($this->sort, $this->direction)
                            ->get();

        return view('livewire.show-pagos', compact('pagos'));
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            $this->direction = $this->direction == 'desc' ? 'asc' : 'desc';
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    public function delete($pagoId)
    {
        $pago = Pago::find($pagoId);
        if ($pago) {
            $pago->delete(); // Marca el registro como eliminado
        }
    }

    public function restore($id)
    {
        $pago = Pago::onlyTrashed()->find($id);
        if ($pago) {
            $pago->restore(); // Restaura el registro eliminado
        }
    }

    public function toggleDeleted()
    {
        $this->showDeleted = !$this->showDeleted; // Alternar entre mostrar eliminados o no
    }
}
