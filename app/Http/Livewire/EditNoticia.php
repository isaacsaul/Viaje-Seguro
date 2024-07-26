<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Noticia;
use Livewire\WithFileUploads;

class EditNoticia extends Component
{

    use WithFileUploads;
    public $open = false;
    public $noticia ,$imagen;


    protected $rules = [
        'noticia.titulo'=>'required',
        'noticia.contenido'=>'required',
        // 'image'=>'required|image|max:2048'
    ];


    public function mount(Noticia $noticia){
        $this->noticia = $noticia;
    }

    public function save(){

        $this->noticia -> save();
        $this->validate();

        $this->reset(['open']);
        $this->emit('render');
        $this->emit('alert','El post se actualizo bien');
    }


    public function render()
    {
        return view('livewire.edit-noticia');
    }
}







