<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuntosRuta extends Model
{
    use HasFactory;

    protected $fillable = ['latitud', 'longitud'];

    public function ruta()
    {
        return $this->belongsTo(Ruta::class);
    }
}
