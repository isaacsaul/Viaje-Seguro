<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Infraccion;
use Livewire\WithPagination;

class ShowInfracciones extends Component
{
    use WithPagination;

    public $search = '';
    public $sort = "id";
    public $direction = "desc";
    public $showDeleted = false;

    protected $listeners = ['render', 'delete' => 'delete', 'deleteInfraccion' => 'delete', 'restore'];

    // Reiniciar la paginación cuando se actualiza la búsqueda
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Infraccion::query()
            ->with(['chofer', 'sancion']); // Eager loading de relaciones

        if ($this->showDeleted) {
            $query->onlyTrashed();
        } else {
            $query->whereNull('deleted_at');
        }

        // Búsqueda específica por CI del chofer
        if (trim($this->search) !== '') {
            $query->whereHas('chofer', function($q) {
                $q->where('ci', 'like', '%' . trim($this->search) . '%');
            });
        }

        $infracciones = $query->orderBy($this->sort, $this->direction)
                             ->paginate(10);

        return view('livewire.show-infracciones', [
            'infracciones' => $infracciones
        ]);
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

    public function delete($id)
    {
        $infraccion = Infraccion::find($id);
        if ($infraccion) {
            $infraccion->delete();
            $this->emit('render');
        }
    }

    public function restore($id)
    {
        $infraccion = Infraccion::onlyTrashed()->find($id);
        if ($infraccion) {
            $infraccion->restore();
            $this->emit('render');
        }
    }

    public function toggleDeleted()
    {
        $this->showDeleted = !$this->showDeleted;
        $this->resetPage();
    }

    // Limpiar la búsqueda
    public function clearSearch()
    {
        $this->search = '';
        $this->resetPage();
    }
}