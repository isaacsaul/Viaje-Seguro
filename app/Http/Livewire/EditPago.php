<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pago;
use App\Models\Chofer;

class EditPago extends Component
{
    public $open = false;
    public $pago;
    public $choferes;

    public function mount(Pago $pago)
    {
        $this->pago = $pago;
        $this->choferes = Chofer::all(); // Cargar todos los choferes para seleccionar un carnet
    }

    protected function rules()
    {
        return [
            'pago.No_serial' => 'required|unique:pagos,No_serial,' . $this->pago->id,
            'pago.fecha' => 'required|date',
            'pago.ci' => 'required|exists:chofers,ci', // Asegúrate de que ci esté en la tabla choferes
        ];
    }

    protected $messages = [
        'pago.No_serial.required' => 'El número de serie es obligatorio.',
        'pago.No_serial.unique' => 'El número de serie ya existe.',
        'pago.fecha.required' => 'La fecha es obligatoria.',
        'pago.fecha.date' => 'La fecha debe ser una fecha válida.',
        'pago.ci.required' => 'El carnet es obligatorio.',
        'pago.ci.exists' => 'El carnet seleccionado no es válido.',
    ];

    public function save()
    {
        $this->validate();

        $this->pago->save();

        $this->emit('render');
        $this->emit('pagoActualizado');
        $this->emit('alert', 'El pago se actualizó correctamente');
        $this->reset(['open']);
    }

    public function render()
    {
        return view('livewire.edit-pago');
    }
}
