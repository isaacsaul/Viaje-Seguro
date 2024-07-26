<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sancion;

class ShowSanciones extends Component
{

    public $search;
    public $sort = "id";
    public $direction = "desc";

    protected $listeners =['render' ,'delete'];


    public function render()
    {
        $sancions = Sancion::where('tiposancion', 'like', '%' . $this->search . '%')
                            ->orWhere('descripcion', 'like', '%' . $this->search . '%')
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
        $sancion->delete();
    }
}
