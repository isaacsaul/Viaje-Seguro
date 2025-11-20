<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Linea extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['codigo', 'tipovehiculo', 'descripcion', 'grupo_id'];


    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }
}
