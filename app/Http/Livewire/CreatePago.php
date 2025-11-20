<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pago;
use App\Models\Chofer;

class CreatePago extends Component
{
    public $open = false;
    public $No_serial, $fecha, $carnet; // Campos para el formulario
    public $carnets = []; // Lista de carnets para el selector

    protected $rules = [
        'No_serial' => 'required|unique:pagos,No_serial',
        'fecha' => 'required|date',
        'carnet' => 'required|exists:chofers,ci', // Asegúrate de que ci esté en la tabla chofers
    ];

    protected $messages = [
        'No_serial.required' => 'El número de serie es obligatorio.',
        'No_serial.unique' => 'El número de serie debe ser único.',
        'fecha.required' => 'La fecha es obligatoria.',
        'fecha.date' => 'La fecha debe ser una fecha válida.',
        'carnet.required' => 'El carnet es obligatorio.',
        'carnet.exists' => 'El carnet seleccionado no es válido.',
    ];

    public function mount()
    {
        $this->cargarCarnets();
    }

    public function cargarCarnets()
    {
        $this->carnets = Chofer::pluck('ci'); // Obtener lista de carnets de choferes
    }

    public function save()
    {
        $this->validate(); // Validar los datos

        Pago::create([
            'No_serial' => $this->No_serial,
            'fecha' => $this->fecha,
            'ci' => $this->carnet, // Usar el campo ci en lugar de carnet
        ]);

        $this->reset(['open', 'No_serial', 'fecha', 'carnet']); // Resetear campos

        $this->emit('render');
        $this->emit('pagoCreado');
        $this->emit('alert', 'El pago se creó correctamente');
    }

    protected $listeners = [
        'choferCreado' => 'cargarCarnets', // Recargar carnets si se crea un nuevo chofer
    ];

    public function render()
    {
        return view('livewire.create-pago');
    }
}
