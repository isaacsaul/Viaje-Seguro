<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tiposocio;

class ShowTiposocio extends Component
{

    public $search;
    public $sort = "id";
    public $direction = "desc";

    protected $listeners =['render' ,'delete'];




    public function render()
    {
        $tiposocios = Tiposocio::where('nombresocio', 'like', '%' . $this->search . '%')
                     ->orWhere('descripcionsocio', 'like', '%' . $this->search . '%')
                     ->orderBy($this->sort ,$this->direction)
                     ->get();
        return view('livewire.show-tiposocio', compact('tiposocios'));
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


    public function delete(Tiposocio $tiposocio)
    {
        $tiposocio->delete();

    }



}
