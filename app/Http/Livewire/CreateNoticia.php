<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Noticia;
use Livewire\WithFileUploads;

class CreateNoticia extends Component
{
    use WithFileUploads;

    public $open = false;

    public $titulo, $contenido, $imagen ;

    protected $rules = [
        'titulo'=>'required',
        'contenido' => 'required|max:255',
        'imagen'=>'required|nullable|image'
    ];

    protected $messages = [
        'titulo.required' => 'El título es obligatorio.',
        'contenido.required' => 'El contenido es obligatorio.',
        'contenido.max' => 'El contenido no puede tener más de 255 caracteres.',
        'imagen.required' => 'La imagen es obligatoria.',
    ];



    public function save(){

        $this->validate();


        $imagen = $this->imagen->store('noticias', 'public');



        Noticia::create([
            'titulo' => $this->titulo,
            'contenido' => $this->contenido,
            'imagen' => $imagen

        ]);

        $this->reset(['open','titulo','contenido','imagen']);

        $this->emit('render');
        $this->emit('alert','La Noticia se creo bien');

    }



    public function render()
    {
        return view('livewire.create-noticia');
    }
}
