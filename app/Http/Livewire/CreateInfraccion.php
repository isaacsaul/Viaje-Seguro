<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Infraccion;
use App\Models\Sancion;
use App\Models\Chofer;

class CreateInfraccion extends Component
{
    public $open = false;
    public $tipoinfraccion, $fechainfraccion, $estado, $id_sancion, $chofer_id;
    public $sanciones;
    public $choferes;


    protected $rules = [
        'tipoinfraccion' => 'required',
        'fechainfraccion' => 'required|date',
        'estado' => 'required',
        'id_sancion' => 'required',
        'chofer_id' => 'required',
    ];

    protected $messages = [
        'tipoinfraccion.required' => 'El campo Tipo de infracción es obligatorio.',
        'fechainfraccion.required' => 'El campo Fecha de infracción es obligatorio.',
        'fechainfraccion.date' => 'El campo Fecha de infracción debe ser una fecha válida.',
        'estado.required' => 'El campo Estado es obligatorio.',
        'id_sancion.required' => 'El campo Sanción es obligatorio.',
        'chofer_id.required' => 'El campo chofer es obligatorio.',


    ];

    public function mount()
    {
        $this->cargarSanciones();
        $this->cargarChoferes();

    }

    public function cargarSanciones()
    {
        $this->sanciones = Sancion::all();
    }

    public function cargarChoferes()
    {
        $this->choferes = Chofer::all();
    }

    public function save()
    {
        $this->validate();

        Infraccion::create([
            'tipoinfraccion' => $this->tipoinfraccion,
            'fechainfraccion' => $this->fechainfraccion,
            'estado' => $this->estado,
            'id_sancion' => $this->id_sancion,
            'chofer_id' => $this->chofer_id,
        ]);

        $this->reset(['open', 'tipoinfraccion', 'fechainfraccion', 'estado', 'id_sancion', 'chofer_id']);

        $this->emit('render');
        $this->emit('alert', 'La infracción se creó correctamente');
    }
    protected $listeners = [
        'sancionCreada' => 'cargarSanciones',
        'choferCreado' => 'cargarChoferes',
    ];


    public function render()
    {
        return view('livewire.create-infraccion');
    }
}
