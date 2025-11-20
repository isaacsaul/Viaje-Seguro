<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tiposocio;

class CreateTiposocio extends Component
{
    public $open = false;
    public $nombresocio, $descripcionsocio;

    protected $rules = [
        'nombresocio' => 'required',
        'descripcionsocio' => 'required',
    ];

    protected $messages = [
        'nombresocio.required' => 'El nombre del socio es obligatorio.',
        'descripcionsocio.required' => 'La descripción del socio es obligatoria.',
    ];

    public function save()
    {
        $this->validate();

        Tiposocio::create([
            'nombresocio' => $this->nombresocio,
            'descripcionsocio' => $this->descripcionsocio,
        ]);

        $this->reset(['open', 'nombresocio', 'descripcionsocio']);

        // Emitir evento para que otros componentes lo escuchen
        $this->emit('tipoSocioCreado');
        $this->emit('alert', 'El tipo de socio se creó correctamente');
    }

    public function render()
    {
        return view('livewire.create-tiposocio');
    }
}
