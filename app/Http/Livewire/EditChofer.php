<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Chofer; // Asegúrate de importar el modelo correcto
use App\Models\Movilidad;
use App\Models\Tiposocio;
class EditChofer extends Component
{
    public $open = false;
    public $chofer;
    public $movilidades;

    protected $rules = [
        'chofer.ci' => 'required',
        'chofer.correo' => 'required',
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
        'chofer.movilidad_id' => 'required|exists:movilidads,id',
        'chofer.tiposocio_id' => 'required|exists:tiposocios,id',
        // Asegúrate de agregar las reglas de validación necesarias
    ];

    // Utiliza el método mount para recibir el chofer que se va a editar
    public function mount(Chofer $chofer)
    {
        $this->chofer = $chofer;
        $this->movilidades = Movilidad::all();
        $this->tiposocios = TipoSocio::all();
    }

    public function save()
    {
        // Valida los datos
        $this->validate();

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
