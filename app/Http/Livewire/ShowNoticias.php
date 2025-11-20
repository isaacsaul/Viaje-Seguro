<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Noticia;

class ShowNoticias extends Component
{
    public $search;
    public $sort = "id";
    public $direction = "desc";
    public $showDeleted = false; // Añadir propiedad para mostrar registros eliminados

    protected $listeners = ['render', 'delete', 'restore'];

    // Método mount donde se verifica si el usuario es admin
    public function mount()
    {
        // Verificar si el usuario NO es admin
        if (!auth()->user()->isAdmin()) {
            // Redirigir a la página principal si no es admin
            return redirect('/');
        }
    }

    public function render()
    {
        $query = Noticia::query();

        if ($this->showDeleted) {
            // Mostrar solo registros eliminados
            $query->onlyTrashed();
        } else {
            // Mostrar solo registros activos
            $query->whereNull('deleted_at');
        }

        $noticias = $query->where(function($query) {
                            $query->where('titulo', 'like', '%' . $this->search . '%')
                                  ->orWhere('contenido', 'like', '%' . $this->search . '%');
                        })
                        ->orderBy($this->sort, $this->direction)
                        ->get();

        return view('livewire.show-noticias', compact('noticias'));
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            $this->direction = $this->direction == 'desc' ? 'asc' : 'desc';
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    public function delete(Noticia $noticia)
    {
        $noticia->delete(); // Marcar como eliminado
    }

    public function restore($id)
    {
        $noticia = Noticia::onlyTrashed()->find($id);
        if ($noticia) {
            $noticia->restore(); // Restaurar registro eliminado
        }
    }

    public function toggleDeleted()
    {
        $this->showDeleted = !$this->showDeleted; // Alternar entre activos y eliminados
    }
}
