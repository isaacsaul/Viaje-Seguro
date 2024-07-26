<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Chofer; // Asegúrate de importar el modelo Chofer
use App\Models\Infraccion;

class ShowTablero extends Component
{
    public $search;
    public $sort = "id";
    public $direction = "desc";

    protected $listeners = ['render', 'delete'];

    public function render()
    {
        $infracciones = Infraccion::where('tipoinfraccion', 'like', '%' . $this->search . '%')
                                   ->orWhere('estado', 'like', '%' . $this->search . '%')
                                   ->orderBy($this->sort, $this->direction)
                                   ->get();
        return view('livewire.show-tablero', compact('infracciones'));

    }


    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    public function delete(Chofer $chofer)
    {
        $chofer->delete();
    }

    public function enviarCorreo($id) {
        // Encuentra el chofer con el ID proporcionado
        $chofer = Chofer::find($id);

        // Envía el correo electrónico utilizando la Mailable
        Mail::to($chofer->correo)->send(new EnviarCorreoMailable($chofer));

        return redirect()->back()->with('success', 'Correo electrónico enviado exitosamente');
    }
}











