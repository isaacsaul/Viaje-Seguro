<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Grupo;

class ShowGrupos extends Component
{

    public $search;
    public $sort = "id";
    public $direction = "desc";

    protected $listeners = ['render', 'delete'];


    public function render()
    {
        $grupos = Grupo::where('codgrupo', 'like', '%' . $this->search . '%')
                       ->orWhere('descripcion', 'like', '%' . $this->search . '%')
                       ->orderBy($this->sort ,$this->direction)
                       ->get();
        return view('livewire.show-grupos', compact('grupos'));
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



    public function delete(Grupo $grupo){
        $grupo->delete();

    }
}
