<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Movilidad;
use App\Models\Linea;

class CreateMovilidad extends Component
{


    public $open = false;
    public $placa,$color, $marca, $modelo, $capacidad, $no_soat;
    public $lineas;
    public $linea_id;

    protected $rules = [
        'placa' => 'required',
        'color' => 'required',
        'marca' => 'required',
        'modelo' => 'required',
        'capacidad' => 'required',
        'no_soat' => 'required',
        'linea_id' => 'required', // Asegúrate de validar el campo de línea
    ];


    protected $messages = [
        'placa.required' => 'La placa es obligatoria.',
        'color.required' => 'El color es obligatorio.',
        'marca.required' => 'La marca es obligatoria.',
        'modelo.required' => 'El modelo es obligatorio.',
        'capacidad.required' => 'La capacidad es obligatoria.',
        'no_soat.required' => 'El número de SOAT es obligatorio.',
        'linea_id.required' => 'La línea es obligatoria.',
    ];

    public function mount()
    {
        $this->cargarLineas();
    }

    public function cargarLineas()
    {
        $this->lineas = Linea::all();
    }

    public function save()
    {
        $this->validate();

        Movilidad::create([
            'placa' => $this->placa,
            'color' => $this->color,
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'capacidad' => $this->capacidad,
            'no_soat' => $this->no_soat,
            'linea_id' => $this->linea_id,
        ]);

        $this->reset(['open', 'placa','color', 'marca', 'modelo', 'capacidad', 'no_soat', 'linea_id']);

        $this->emit('render');
        $this->emit('movilidadCreada');
        $this->emit('alert', 'La movilidad se creó correctamente');
    }

    protected $listeners = ['lineaCreada' => 'cargarLineas'];


    public function render()
    {
        return view('livewire.create-movilidad');
    }
}
