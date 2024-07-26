<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Chofer;
use App\Models\Movilidad;
use App\Models\Tiposocio;


class CreateChofer extends Component
{
    public $open = false;
    public $ci,$correo, $nombres, $apellidos, $fecha_ingreso, $celular, $estado_civil, $no_domicilio, $barrio_domicilio, $ciudad, $no_licencia, $lugar_nacimiento;
    public $movilidad_id, $tiposocio_id;

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
        'movilidad_id' => 'required|exists:movilidads,id', // Asegúrate de que exista la movilidad con ese id
        'tiposocio_id' => 'required|exists:tiposocios,id', // Asegúrate de que exista el tipo de socio con ese id
    ];

    protected $messages = [
        'ci.required' => 'El campo CI es obligatorio.',
        'correo.required' => 'El campo Correo electrónico es obligatorio.',
        'correo.email' => 'El campo Correo electrónico debe ser una dirección de correo válida.',
        'nombres.required' => 'El campo Nombres es obligatorio.',
        'apellidos.required' => 'El campo Apellidos es obligatorio.',
        'fecha_ingreso.required' => 'El campo Fecha de ingreso es obligatorio.',
        'fecha_ingreso.date' => 'El campo Fecha de ingreso debe ser una fecha válida.',
        'celular.required' => 'El campo Celular es obligatorio.',
        'estado_civil.required' => 'El campo Estado civil es obligatorio.',
        'no_domicilio.required' => 'El campo Número de domicilio es obligatorio.',
        'barrio_domicilio.required' => 'El campo Barrio de domicilio es obligatorio.',
        'ciudad.required' => 'El campo Ciudad es obligatorio.',
        'no_licencia.required' => 'El campo Número de licencia es obligatorio.',
        'lugar_nacimiento.required' => 'El campo Lugar de nacimiento es obligatorio.',
        'movilidad_id.required' => 'El campo Movilidad es obligatorio.',
        'movilidad_id.exists' => 'La movilidad seleccionada no existe.',
        'tiposocio_id.required' => 'El campo Tipo de socio es obligatorio.',
        'tiposocio_id.exists' => 'El tipo de socio seleccionado no existe.',
    ];


    public function mount()
    {
        // Inicializa la variable $movilidades con los datos necesarios
        $this->cargarMovilidades();
        $this->tiposocios = TipoSocio::all();
    }

    public function cargarMovilidades()
    {
        $this->movilidades = Movilidad::all();
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

        $this->reset(['open', 'ci','correo', 'nombres', 'apellidos', 'fecha_ingreso', 'celular', 'estado_civil', 'no_domicilio', 'barrio_domicilio', 'ciudad', 'no_licencia', 'lugar_nacimiento', 'movilidad_id', 'tiposocio_id']);

        $this->emit('render');
        $this->emit('choferCreado');
        $this->emit('alert', 'El chofer se creó correctamente');
    }
    protected $listeners = ['movilidadCreada' => 'cargarMovilidades'];


    public function render()
    {
        return view('livewire.create-chofer');
    }
}
