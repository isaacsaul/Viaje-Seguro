<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movilidad extends Model
{
    use HasFactory, SoftDeletes;

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
