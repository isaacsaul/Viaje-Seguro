<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Chofer; // Asegúrate de importar el modelo Chofer

class ShowChoferes extends Component
{
    public $search;
    public $sort = "id";
    public $direction = "desc";

    protected $listeners = ['render', 'delete'];

    public function render()
    {
        $choferes = Chofer::where('ci', 'like', '%' . $this->search . '%')
                           ->orWhere('nombres', 'like', '%' . $this->search . '%')
                           ->orWhere('apellidos', 'like', '%' . $this->search . '%')
                           ->orderBy($this->sort, $this->direction)
                           ->get();
        return view('livewire.show-choferes', compact('choferes'));
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    public function delete(Chofer $chofer)
    {
        $chofer->delete();
    }
}
