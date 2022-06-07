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
        Schema::create('animals', function (Blueprint $table) {
            $table->id()->onDelete('set null');
            $table->string('nombre');
            $table->string('historia');
            $table->string('superpoder');
            $table->date('fecha_entrada');
            $table->date('fecha_fallecimiento')->nullable();
            // Clave foránea del equipo en el que están. 
            $table->unsignedBigInteger('equipos_id')->nullable();
            $table->foreign('equipos_id')->references('id')->on('equipos')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animales');
    }
};
