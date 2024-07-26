<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
    use HasFactory;

    protected $fillable = ['codigo', 'tipovehiculo', 'descripcion', 'grupo_id'];


    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }
}
