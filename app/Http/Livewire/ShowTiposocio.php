<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tiposocio;

class ShowTiposocio extends Component
{
    public $search;
    public $sort = "id";
    public $direction = "desc";
    public $showDeleted = false; // Añade una propiedad para mostrar registros eliminados

    protected $listeners = ['render', 'delete', 'restore'];

    public function render()
    {
        $query = Tiposocio::query();

        if ($this->showDeleted) {
            // Solo registros eliminados
            $query->onlyTrashed();
        } else {
            // Solo registros activos
            $query->whereNull('deleted_at');
        }

        $tiposocios = $query->where(function($query) {
                                $query->where('nombresocio', 'like', '%' . $this->search . '%')
                                      ->orWhere('descripcionsocio', 'like', '%' . $this->search . '%');
                            })
                            ->orderBy($this->sort, $this->direction)
                            ->get();

        return view('livewire.show-tiposocio', compact('tiposocios'));
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

    public function delete(Tiposocio $tiposocio)
    {
        $tiposocio->delete(); // Marca el registro como eliminado
    }

    public function restore($id)
    {
        $tiposocio = Tiposocio::onlyTrashed()->find($id);
        if ($tiposocio) {
            $tiposocio->restore();
        }
    }

    public function toggleDeleted()
    {
        $this->showDeleted = !$this->showDeleted;
    }
}
