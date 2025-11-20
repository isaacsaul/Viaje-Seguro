<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Grupo;

class ShowGrupos extends Component
{
    public $search;
    public $sort = "id";
    public $direction = "desc";
    public $showDeleted = false; // Propiedad para mostrar registros eliminados

    protected $listeners = ['render', 'delete', 'restore'];

    public function render()
    {
        $query = Grupo::query();

        if ($this->showDeleted) {
            // Solo registros eliminados
            $query->onlyTrashed();
        } else {
            // Solo registros activos
            $query->whereNull('deleted_at');
        }

        $grupos = $query->where(function($query) {
                                $query->where('codgrupo', 'like', '%' . $this->search . '%')
                                      ->orWhere('descripcion', 'like', '%' . $this->search . '%')
                                      ->orWhere('fechafundacion', 'like', '%' . $this->search . '%')
                                      ->orWhere('encargado', 'like', '%' . $this->search . '%');
                            })
                            ->orderBy($this->sort, $this->direction)
                            ->get();

        return view('livewire.show-grupos', compact('grupos'));
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

    public function delete(Grupo $grupo)
    {
        $grupo->delete(); // Marca el registro como eliminado
    }

    public function restore($id)
    {
        $grupo = Grupo::onlyTrashed()->find($id);
        if ($grupo) {
            $grupo->restore();
        }
    }

    public function toggleDeleted()
    {
        $this->showDeleted = !$this->showDeleted;
    }
}
