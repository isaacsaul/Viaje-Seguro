<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Infraccion; // Asegúrate de importar el modelo correcto

class ShowInfracciones extends Component
{
    public $search;
    public $sort = "id";
    public $direction = "desc";

    protected $listeners = ['render', 'delete'];

    public function render()
    {
        $infracciones = Infraccion::where('tipoinfraccion', 'like', '%' . $this->search . '%')
                                   ->orWhere('estado', 'like', '%' . $this->search . '%')
                                   ->orderBy($this->sort, $this->direction)
                                   ->get();
        return view('livewire.show-infracciones', compact('infracciones'));
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

    public function delete(Infraccion $infraccion)
    {
        $infraccion->delete();
    }
}
