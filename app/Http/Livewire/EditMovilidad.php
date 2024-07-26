<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Movilidad;
use App\Models\Linea;

class EditMovilidad extends Component
{
    public $open = false;
    public $movilidad;
    public $lineas;

    protected $rules = [
        'movilidad.placa' => 'required',
        'movilidad.color' => 'required',
        'movilidad.marca' => 'required',
        'movilidad.modelo' => 'required',
        'movilidad.capacidad' => 'required',
        'movilidad.no_soat' => 'required',
        'movilidad.linea_id' => 'required',
    ];

    public function mount(Movilidad $movilidad)
    {
        $this->movilidad = $movilidad;
        $this->lineas = Linea::all();
    }

    public function save()
    {
        $this->validate();

        $this->movilidad->save();

        $this->reset(['open']);
        $this->emit('render');
        $this->emit('alert', 'La movilidad se actualizó correctamente');
    }

    public function render()
    {
        return view('livewire.edit-movilidad');
    }
}
