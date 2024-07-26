<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Infraccion; // Asegúrate de importar los modelos necesarios

class ShowUsuarios extends Component
{
    public $licenseNo;
    public $plate;

    public function search()
    {
        // Realizar la consulta usando Eloquent
        $data = Infraccion::select('infraccions.*', 'chofers.*', 'movilidads.*', 'sancions.*')
            ->join('chofers', 'infraccions.chofer_id', '=', 'chofers.id')
            ->join('movilidads', 'chofers.movilidad_id', '=', 'movilidads.id')
            ->join('sancions', 'infraccions.id_sancion', '=', 'sancions.id')
            ->where('chofers.no_licencia', $this->licenseNo)
            ->where('movilidads.placa', $this->plate)
            ->get();

        // Enviar los datos al evento del navegador como JSON
        $this->dispatchBrowserEvent('form-submitted', [
            'data' => $data->toJson()
        ]);
    }

    public function render()
    {
        return view('livewire.show-usuarios');
    }
}
