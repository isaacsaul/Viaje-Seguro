<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chofer extends Model
{
    use HasFactory;

    protected $fillable = [
        'ci',
        'correo',
        'nombres',
        'apellidos',
        'fecha_ingreso',
        'celular',
        'estado_civil',
        'no_domicilio',
        'barrio_domicilio',
        'ciudad',
        'no_licencia',
        'lugar_nacimiento',
        'movilidad_id', // Agrega la clave foránea para la relación con la tabla movilidads
        'tiposocio_id', // Agrega la clave foránea para la relación con la tabla tiposocios
    ];

    public function movilidad()
    {
        return $this->belongsTo(Movilidad::class);
    }

    public function tiposocio()
    {
        return $this->belongsTo(TipoSocio::class);
    }
}
