<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chofers', function (Blueprint $table) {
            $table->id();
            $table->string('ci');
            $table->string('correo');
            $table->string('nombres');
            $table->string('apellidos');
            $table->date('fecha_ingreso');
            $table->string('celular');
            $table->string('estado_civil');
            $table->string('no_domicilio');
            $table->string('barrio_domicilio');
            $table->string('ciudad');
            $table->string('no_licencia');
            $table->string('lugar_nacimiento');
            $table->foreignId('movilidad_id')->constrained('movilidads')->onDelete('cascade');
            $table->foreignId('tiposocio_id')->constrained('tiposocios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chofers');
    }
};
