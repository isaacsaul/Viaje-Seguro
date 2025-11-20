<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Infraccion extends Model
{

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'tipoinfraccion',
        'fechainfraccion',
        'estado',
        'id_sancion',
        'chofer_id',
    ];


    // Definición de la relación con la tabla 'sancions'
    public function sancion()
    {
        return $this->belongsTo(Sancion::class, 'id_sancion');
    }

    // Definición de la relación con la tabla 'chofers'
    public function chofer()
    {
        return $this->belongsTo(Chofer::class, 'chofer_id');
    }
}
