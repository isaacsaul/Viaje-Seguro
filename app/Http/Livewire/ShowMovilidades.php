<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Movilidad;

class ShowMovilidades extends Component
{
    public $search;
    public $sort = "id";
    public $direction = "desc";
    public $showDeleted = false; // Añade una propiedad para mostrar registros eliminados

    protected $listeners = ['render', 'delete', 'restore'];

    public function render()
    {
        $query = Movilidad::query();

        if ($this->showDeleted) {
            // Solo registros eliminados
            $query->onlyTrashed();
        } else {
            // Solo registros activos
            $query->whereNull('deleted_at');
        }

        $movilidades = $query->where(function($query) {
            $query->where('placa', 'like', '%' . $this->search . '%')
                  ->orWhere('marca', 'like', '%' . $this->search . '%')
                  ->orWhere('modelo', 'like', '%' . $this->search . '%');
        })
        ->orderBy($this->sort, $this->direction)
        ->get();

        return view('livewire.show-movilidades', compact('movilidades'));
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

    public function delete(Movilidad $movilidad)
    {
        $movilidad->delete(); // Marca el registro como eliminado
    }

    public function restore($id)
    {
        $movilidad = Movilidad::onlyTrashed()->find($id);
        if ($movilidad) {
            $movilidad->restore();
        }
    }

    public function toggleDeleted()
    {
        $this->showDeleted = !$this->showDeleted; // Alterna la vista entre activos y eliminados
    }
}
