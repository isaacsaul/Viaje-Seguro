<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tiposocio; // Asegúrate de importar el modelo correcto


class EditTiposocio extends Component
{


    public $open = false;
    public $tiposocio; // Cambia el nombre de la variable a tiposocio

    protected $rules = [
        'tiposocio.nombresocio' => 'required',
        'tiposocio.descripcionsocio' => 'required',
        // Agrega las reglas de validación para la imagen si es necesario
    ];

    // Utiliza el método mount para recibir el tipo de socio que se va a editar
    public function mount(Tiposocio $tiposocio)
    {
        $this->tiposocio = $tiposocio;
    }

    public function save()
    {
        // Valida los datos
        $this->validate();

        // Guarda los cambios
        $this->tiposocio->save();

        // Resetea el estado del modal y emite eventos
        $this->reset(['open']);
        $this->emit('render');
        $this->emit('alert', 'El tipo de socio se actualizó correctamente');
    }

    public function render()
    {
        return view('livewire.edit-tiposocio');
    }
}
