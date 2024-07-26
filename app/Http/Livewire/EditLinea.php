<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Linea; // Asegúrate de importar el modelo correcto
use App\Models\Grupo;

class EditLinea extends Component
{
    public $open = false;
    public $linea;
    public $grupos; // Agrega la variable $grupos

    protected $rules = [
        'linea.codigo' => 'required',
        'linea.tipovehiculo' => 'required',
        'linea.descripcion' => 'required',
        'linea.grupo_id' => 'required',
        // Agrega las reglas de validación necesarias
    ];

    // Utiliza el método mount para recibir la línea que se va a editar
    public function mount(Linea $linea)
    {
        $this->linea = $linea;
        $this->grupos = Grupo::all();

    }

    public function save()
    {
        // Valida los datos
        $this->validate();

        // Guarda los cambios
        $this->linea->save();

        // Resetea el estado del modal y emite eventos
        $this->reset(['open']);
        $this->emit('render');
        $this->emit('alert', 'La línea se actualizó correctamente');
    }

    public function render()
    {
        return view('livewire.edit-linea');
    }
}
