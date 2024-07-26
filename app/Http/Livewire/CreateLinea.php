<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Linea;
use App\Models\Grupo;

class CreateLinea extends Component
{
    public $open = false;
    public $codigo, $tipovehiculo, $descripcion;
    public $grupos;
    public $grupo_id; // Agregar esta línea para definir la propiedad

    protected $rules = [
        'codigo' => 'required',
        'tipovehiculo' => 'required',
        'descripcion' => 'required',
        'grupo_id' => 'required', // Asegúrate de validar el campo grupo_id
    ];

    protected $messages = [
        'codigo.required' => 'El código es obligatorio.',
        'tipovehiculo.required' => 'El tipo de vehículo es obligatorio.',
        'descripcion.required' => 'La descripción es obligatoria.',
        'grupo_id.required' => 'El grupo es obligatorio.',
    ];

    public function mount()
    {
        $this->cargarGrupos();
    }

    public function cargarGrupos()
    {
        $this->grupos = Grupo::all();
    }

    public function save()
    {
        $this->validate();

        Linea::create([
            'codigo' => $this->codigo,
            'tipovehiculo' => $this->tipovehiculo,
            'descripcion' => $this->descripcion,
            'grupo_id' => $this->grupo_id,
        ]);

        $this->reset(['open', 'codigo', 'tipovehiculo', 'descripcion', 'grupo_id']);

        $this->emit('render');
        $this->emit('lineaCreada');
        $this->emit('alert', 'La línea se creó correctamente');
    }

  protected $listeners = ['grupoCreado' => 'cargarGrupos'];


    public function render()
    {
        return view('livewire.create-linea');
    }
}

