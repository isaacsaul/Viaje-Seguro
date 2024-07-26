<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sancion;

class CreateSancion extends Component
{


    public $open = false;
    public $tiposancion, $descripcion;

    protected $rules = [
        'tiposancion' => 'required',
        'descripcion' => 'required',
    ];

    protected $messages = [
        'tiposancion.required' => 'El campo Tipo de sanción es obligatorio.',
        'descripcion.required' => 'El campo Descripción es obligatorio.',
    ];

    public function save()
    {
        $this->validate();

        Sancion::create([
            'tiposancion' => $this->tiposancion,
            'descripcion' => $this->descripcion,
        ]);

        $this->reset(['open', 'tiposancion', 'descripcion']);

        $this->emit('render');
        $this->emit('sancionCreada');
        $this->emit('alert', 'La sanción se creó correctamente');
    }


    public function render()
    {
        return view('livewire.create-sancion');
    }
}
