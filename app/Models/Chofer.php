<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chofer extends Model
{
    use HasFactory, SoftDeletes;

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

    public function pagos()
    {
        return $this->hasMany(Pago::class, 'ci', 'ci');
    }

    // NUEVO: Método estático para verificar carnet (CI)
    public static function verificarCarnet($carnet)
    {
        if (empty($carnet)) {
            return [
                'success' => false,
                'message' => 'Carnet is required',
                'existe' => false
            ];
        }

        try {
            $chofer = self::where('ci', $carnet)
                ->whereNull('deleted_at') // Solo registros no eliminados
                ->first();

            if ($chofer) {
                return [
                    'success' => true,
                    'message' => 'Carnet found',
                    'existe' => true,
                    'data' => [
                        'id' => $chofer->id,
                        'ci' => $chofer->ci,
                        'nombres' => $chofer->nombres,
                        'apellidos' => $chofer->apellidos,
                        'correo' => $chofer->correo,
                        'celular' => $chofer->celular,
                        'no_licencia' => $chofer->no_licencia
                    ]
                ];
            } else {
                return [
                    'success' => true,
                    'message' => 'Carnet not found',
                    'existe' => false
                ];
            }

        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Error checking carnet: ' . $e->getMessage(),
                'existe' => false
            ];
        }
    }
}