<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Linea;

class ShowLineas extends Component
{
    public $search;
    public $sort = "id";
    public $direction = "desc";
    public $showDeleted = false; // Añade una propiedad para mostrar registros eliminados

    protected $listeners = ['render', 'delete', 'restore', 'toggleDeleted']; // Añade 'restore' y 'toggleDeleted' a los listeners

    public function render()
    {
        $query = Linea::query();

        if ($this->showDeleted) {
            // Solo registros eliminados
            $query->onlyTrashed();
        } else {
            // Solo registros activos
            $query->whereNull('deleted_at');
        }

        $lineas = $query->where(function($query) {
                                $query->where('codigo', 'like', '%' . $this->search . '%')
                                      ->orWhere('descripcion', 'like', '%' . $this->search . '%');
                            })
                            ->orderBy($this->sort, $this->direction)
                            ->get();

        return view('livewire.show-lineas', compact('lineas'));
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

    public function delete(Linea $linea)
    {
        $linea->delete(); // Marca el registro como eliminado
    }

    public function restore($id)
    {
        $linea = Linea::onlyTrashed()->find($id);
        if ($linea) {
            $linea->restore();
        }
    }

    public function toggleDeleted()
    {
        $this->showDeleted = !$this->showDeleted;
    }
}
