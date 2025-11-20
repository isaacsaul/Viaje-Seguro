<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Noticia;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditNoticia extends Component
{
    use WithFileUploads;

    public $open = false;
    public $noticia, $imagen;

    protected $rules = [
        'noticia.titulo' => 'required',
        'noticia.contenido' => 'required',
    ];

    public function mount(Noticia $noticia)
    {
        $this->noticia = $noticia;
    }

    public function save()
    {
        $this->validate();

        if ($this->imagen) {
            // Elimina imagen anterior si existe
            if ($this->noticia->imagen && Storage::disk('public')->exists($this->noticia->imagen)) {
                Storage::disk('public')->delete($this->noticia->imagen);
            }

            // Guarda la nueva imagen en el disco público
            $this->noticia->imagen = $this->imagen->store('noticias', 'public');
        }

        $this->noticia->save();

        $this->reset(['open', 'imagen']);
        $this->emit('render');
        $this->emit('alert', 'La noticia se actualizó correctamente.');
    }

    public function render()
    {
        return view('livewire.edit-noticia');
    }
}
