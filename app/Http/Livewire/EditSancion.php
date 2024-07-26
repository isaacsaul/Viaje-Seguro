<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sancion;

class EditSancion extends Component
{

    public $open = false;
    public $sancion;

    protected $rules = [
        'sancion.tiposancion' => 'required',
        'sancion.descripcion' => 'required',
    ];



    public function mount(Sancion $sancion)
    {
        $this->sancion = $sancion;
    }


    public function save()
    {
        $this->validate();

        $this->sancion->save();

        $this->reset(['open']);
        $this->emit('render');
        $this->emit('alert', 'La sanción se actualizó correctamente');
    }

    
    public function render()
    {
        return view('livewire.edit-sancion');
    }
}
