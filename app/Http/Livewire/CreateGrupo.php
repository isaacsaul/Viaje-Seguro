<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Grupo;

class CreateGrupo extends Component
{

    public $open = false;
    public $codgrupo, $descripcion, $fechafundacion, $encargado;

    protected $rules = [
        'codgrupo' => 'required',
        'descripcion' => 'required',
        'fechafundacion' => 'required|date',
        'encargado' => 'required',
    ];

    protected $messages = [
        'codgrupo.required' => 'El código del grupo es obligatorio.',
        'descripcion.required' => 'La descripción del grupo es obligatoria.',
        'fechafundacion.required' => 'La fecha de fundación del grupo es obligatoria.',
        'fechafundacion.date' => 'La fecha de fundación debe ser una fecha válida.',
        'encargado.required' => 'El nombre del encargado del grupo es obligatorio.',
    ];

    public function save()
    {
        $this->validate();

        Grupo::create([
            'codgrupo' => $this->codgrupo,
            'descripcion' => $this->descripcion,
            'fechafundacion' => $this->fechafundacion,
            'encargado' => $this->encargado,
        ]);

        $this->reset(['open', 'codgrupo', 'descripcion', 'fechafundacion', 'encargado']);

        $this->emit('render');
        $this->emit('grupoCreado');
        $this->emit('alert', 'El grupo se creó correctamente');
    }



    public function render()
    {
        return view('livewire.create-grupo');
    }
}
