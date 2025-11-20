<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sancion;

class ShowSanciones extends Component
{
    public $search;
    public $sort = "id";
    public $direction = "desc";
    public $showDeleted = false; // Propiedad para mostrar registros eliminados

    protected $listeners = ['render', 'delete', 'restore'];

    public function render()
    {
        $query = Sancion::query();

        if ($this->showDeleted) {
            // Mostrar solo registros eliminados
            $query->onlyTrashed();
        } else {
            // Mostrar solo registros activos
            $query->whereNull('deleted_at');
        }

        // Filtro de búsqueda
        $sancions = $query->where(function ($query) {
                                $query->where('tiposancion', 'like', '%' . $this->search . '%')
                                      ->orWhere('descripcion', 'like', '%' . $this->search . '%');
                            })
                            ->orderBy($this->sort, $this->direction)
                            ->get();

        return view('livewire.show-sanciones', compact('sancions'));
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

    public function delete(Sancion $sancion)
    {
        $sancion->delete(); // Marcar como eliminado
    }

    public function restore($id)
    {
        $sancion = Sancion::onlyTrashed()->find($id);
        if ($sancion) {
            $sancion->restore(); // Restaurar el registro
        }
    }

    public function toggleDeleted()
    {
        $this->showDeleted = !$this->showDeleted; // Alternar entre mostrar eliminados o no
    }
}
