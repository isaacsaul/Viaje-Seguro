<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Chofer;
use App\Models\Movilidad;
use App\Models\Tiposocio; // Asegúrate de que el nombre sea correcto

class EditChofer extends Component
{
    public $open = false;
    public $chofer;
    public $movilidades;
    public $tiposocios;
    public $movilidad_id;
    public $tiposocio_id;

    protected $rules = [
        'chofer.ci' => 'required',
        'chofer.correo' => 'required|email',
        'chofer.nombres' => 'required',
        'chofer.apellidos' => 'required',
        'chofer.fecha_ingreso' => 'required',
        'chofer.celular' => 'required',
        'chofer.estado_civil' => 'required',
        'chofer.no_domicilio' => 'required',
        'chofer.barrio_domicilio' => 'required',
        'chofer.ciudad' => 'required',
        'chofer.no_licencia' => 'required',
        'chofer.lugar_nacimiento' => 'required',
        'movilidad_id' => 'required|exists:movilidads,id',
        'tiposocio_id' => 'required|exists:tiposocios,id',
    ];

    public function mount(Chofer $chofer)
    {
        $this->chofer = $chofer;
        $this->movilidades = Movilidad::all();
        $this->tiposocios = Tiposocio::all();

        // Asigna los valores de movilidad y tipo de socio actuales del chofer
        $this->movilidad_id = $chofer->movilidad_id;
        $this->tiposocio_id = $chofer->tiposocio_id;
    }

    public function save()
    {
        // Valida los datos
        $this->validate();

        // Asigna los valores de movilidad y tipo de socio al chofer antes de guardar
        $this->chofer->movilidad_id = $this->movilidad_id;
        $this->chofer->tiposocio_id = $this->tiposocio_id;

        // Guarda los cambios
        $this->chofer->save();

        // Resetea el estado del modal y emite eventos
        $this->reset(['open']);
        $this->emit('render');
        $this->emit('alert', 'El chofer se actualizó correctamente');
    }

    public function render()
    {
        return view('livewire.edit-chofer');
    }
}
