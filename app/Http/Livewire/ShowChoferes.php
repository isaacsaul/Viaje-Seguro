<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Chofer; // Asegúrate de importar el modelo Chofer

class ShowChoferes extends Component
{
    public $search;
    public $sort = "id";
    public $direction = "desc";
    public $showDeleted = false; // Añade una propiedad para mostrar registros eliminados

    protected $listeners = ['render', 'delete', 'restore'];

    public function render()
    {
        $query = Chofer::query();

        if ($this->showDeleted) {
            // Solo registros eliminados
            $query->onlyTrashed();
        } else {
            // Solo registros activos
            $query->whereNull('deleted_at');
        }

        $choferes = $query->where(function($query) {
                                $query->where('ci', 'like', '%' . $this->search . '%')
                                      ->orWhere('nombres', 'like', '%' . $this->search . '%')
                                      ->orWhere('apellidos', 'like', '%' . $this->search . '%');
                            })
                            ->orderBy($this->sort, $this->direction)
                            ->get();

        return view('livewire.show-choferes', compact('choferes'));
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

    public function delete(Chofer $chofer)
    {
        $chofer->delete(); // Marca el registro como eliminado
    }

    public function restore($id)
    {
        $chofer = Chofer::onlyTrashed()->find($id);
        if ($chofer) {
            $chofer->restore();
        }
    }

    public function toggleDeleted()
    {
        $this->showDeleted = !$this->showDeleted;
    }
}
