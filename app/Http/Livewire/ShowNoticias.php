<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Noticia;

class ShowNoticias extends Component
{

    public $search;
    public $sort = "id";
    public $direction = "desc";

    protected $listeners =['render' ,'delete'];


    public function render()
    {
        $noticias = Noticia::where('titulo', 'like', '%' . $this->search . '%')
                     ->orWhere('contenido', 'like', '%' . $this->search . '%')
                     ->orderBy($this->sort ,$this->direction)
                     ->get();
        return view('livewire.show-noticias', compact('noticias'));
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


    public function delete(Noticia $noticia){
        $noticia->delete();

    }
}
