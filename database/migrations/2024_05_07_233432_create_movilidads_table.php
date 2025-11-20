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
        Schema::create('movilidads', function (Blueprint $table) {
            $table->id();
            $table->string('placa')->unique();
            $table->string('color');
            $table->string('marca');
            $table->string('modelo');
            $table->integer('capacidad');
            $table->string('no_soat')->unique();
            $table->foreignId('linea_id')->constrained('lineas')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movilidads');
    }
};
