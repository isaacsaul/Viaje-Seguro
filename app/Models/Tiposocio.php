<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiposocio extends Model
{
    use HasFactory;

    protected $fillable = ['nombresocio', 'descripcionsocio'];
}
