<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pago extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'No_serial',
        'fecha',
        'ci',
    ];

    /**
     * Relación con el modelo Chofer.
     * Un pago pertenece a un chofer.
     */
    public function chofer()
    {
        return $this->belongsTo(Chofer::class, 'ci', 'ci');
    }
}
