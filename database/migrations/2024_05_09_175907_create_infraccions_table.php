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
        Schema::create('infraccions', function (Blueprint $table) {
            $table->id();
            $table->string('tipoinfraccion');
            $table->date('fechainfraccion');
            $table->string('estado');
             // Relación con la tabla 'sanciones'
             $table->unsignedBigInteger('id_sancion');
             $table->foreign('id_sancion')->references('id')->on('sancions')->onDelete('cascade');
             // Relación con la tabla 'chofers'
             $table->unsignedBigInteger('chofer_id');
             $table->foreign('chofer_id')->references('id')->on('chofers')->onDelete('cascade');
             $table->timestamps();
             $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infraccions');
    }
};
