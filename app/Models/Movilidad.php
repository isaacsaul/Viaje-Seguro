<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movilidad extends Model
{
    use HasFactory;

    protected $fillable = [
        'placa',
        'color',
        'marca',
        'modelo',
        'capacidad',
        'no_soat',
        'linea_id',

    ];

    public function linea()
    {
        return $this->belongsTo(Linea::class);
    }



}
