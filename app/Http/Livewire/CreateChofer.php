<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Chofer;
use App\Models\Movilidad;
use App\Models\TipoSocio; // Asegúrate de que sea el nombre correcto

class CreateChofer extends Component
{
    public $open = false;
    public $ci, $correo, $nombres, $apellidos, $fecha_ingreso, $celular, $estado_civil, $no_domicilio, $barrio_domicilio, $ciudad, $no_licencia, $lugar_nacimiento;
    public $movilidad_id, $tiposocio_id;
    public $movilidades, $tiposocios; // Asegúrate de definir estas propiedades

    protected $rules = [
        'ci' => 'required',
        'correo' => 'required|email',
        'nombres' => 'required',
        'apellidos' => 'required',
        'fecha_ingreso' => 'required',
        'celular' => 'required',
        'estado_civil' => 'required',
        'no_domicilio' => 'required',
        'barrio_domicilio' => 'required',
        'ciudad' => 'required',
        'no_licencia' => 'required',
        'lugar_nacimiento' => 'required',
        'movilidad_id' => 'required|exists:movilidads,id',
        'tiposocio_id' => 'required|exists:tiposocios,id',
    ];

    protected $messages = [
        'ci.required' => 'El campo CI es obligatorio.',
        'correo.required' => 'El campo Correo electrónico es obligatorio.',
        'correo.email' => 'El campo Correo electrónico debe ser una dirección de correo válida.',
        //... demás mensajes
    ];

    public function mount()
    {
        $this->cargarMovilidades();
        $this->tiposocios = TipoSocio::all(); // Mantener esta línea
    }

    public function cargarMovilidades()
    {
        $this->movilidades = Movilidad::all();
    }

    public function cargarTiposSocios()
    {
        $this->tiposocios = TipoSocio::all();
    }

    public function save()
    {
        $this->validate();

        Chofer::create([
            'ci' => $this->ci,
            'correo' => $this->correo,
            'nombres' => $this->nombres,
            'apellidos' => $this->apellidos,
            'fecha_ingreso' => $this->fecha_ingreso,
            'celular' => $this->celular,
            'estado_civil' => $this->estado_civil,
            'no_domicilio' => $this->no_domicilio,
            'barrio_domicilio' => $this->barrio_domicilio,
            'ciudad' => $this->ciudad,
            'no_licencia' => $this->no_licencia,
            'lugar_nacimiento' => $this->lugar_nacimiento,
            'movilidad_id' => $this->movilidad_id,
            'tiposocio_id' => $this->tiposocio_id,
        ]);

        $this->reset(['open', 'ci', 'correo', 'nombres', 'apellidos', 'fecha_ingreso', 'celular', 'estado_civil', 'no_domicilio', 'barrio_domicilio', 'ciudad', 'no_licencia', 'lugar_nacimiento', 'movilidad_id', 'tiposocio_id']);

        $this->emit('render');
        $this->emit('choferCreado'); // Emitir evento para actualizar la lista de carnets
        $this->emit('alert', 'El chofer se creó correctamente');
    }

    protected $listeners = [
        'movilidadCreada' => 'cargarMovilidades',
        'tipoSocioCreado' => 'cargarTiposSocios',
    ];

    public function render()
    {
        return view('livewire.create-chofer');
    }
}
