<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Infraccion; // Asegúrate de importar el modelo correcto
use App\Models\Sancion;

class EditInfraccion extends Component
{
    public $open = false;
    public $infraccion;
    public $sanciones; // Agrega la variable $sanciones

    protected $rules = [
        'infraccion.tipoinfraccion' => 'required',
        'infraccion.fechainfraccion' => 'required',
        'infraccion.estado' => 'required',
        'infraccion.id_sancion' => 'required',
        // Agrega las reglas de validación necesarias
    ];

     // Utiliza el método mount para recibir la infracción que se va a editar
     public function mount(Infraccion $infraccion)
     {
         $this->infraccion = $infraccion;
         $this->sanciones = Sancion::all();
     }


     public function save()
     {
         // Valida los datos
         $this->validate();

         // Guarda los cambios
         $this->infraccion->save();

         // Resetea el estado del modal y emite eventos
         $this->reset(['open']);
         $this->emit('render');
         $this->emit('alert', 'La infracción se actualizó correctamente');
     }

     
    public function render()
    {
        return view('livewire.edit-infraccion');
    }
}
