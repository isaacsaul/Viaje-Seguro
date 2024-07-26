<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Grupo;

class EditGrupo extends Component

{

    public $open = false;
    public $grupo; // Cambia el nombre de la variable a grupo

    protected $rules = [
        'grupo.codgrupo' => 'required',
        'grupo.descripcion' => 'required',
        'grupo.fechafundacion' => 'required', // Agrega la validación para fechafundacion
        'grupo.encargado' => 'required', 
    ];

      // Utiliza el método mount para recibir el grupo que se va a editar
      public function mount(Grupo $grupo)
      {
          $this->grupo = $grupo;
      }


      public function save()
    {
        // Valida los datos
        $this->validate();

        // Guarda los cambios
        $this->grupo->save();

        // Resetea el estado del modal y emite eventos
        $this->reset(['open']);
        $this->emit('render');
        $this->emit('alert', 'El grupo se actualizó correctamente');
    }
    public function render()
    {
        return view('livewire.edit-grupo');
    }
}
