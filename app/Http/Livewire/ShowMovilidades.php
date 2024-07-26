<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Movilidad; // Asegúrate de importar el modelo correcto

class ShowMovilidades extends Component
{
    public $search;
    public $sort = "id";
    public $direction = "desc";

    protected $listeners = ['render', 'delete'];

    public function render()
    {
        $movilidades = Movilidad::where('placa', 'like', '%' . $this->search . '%')
                                   ->orWhere('marca', 'like', '%' . $this->search . '%')
                                   ->orWhere('modelo', 'like', '%' . $this->search . '%')
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
        $movilidad->delete();
    }
}
