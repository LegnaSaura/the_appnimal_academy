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
        Schema::create('apadrinamientos', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo', ['Mensual', 'Trimestral', 'Anual']);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('cantidad');
            $table->enum('confirmacion_pago', ['Sí', 'No']);
            // Clave foránea del animal apadrinado. 
            $table->unsignedBigInteger('animales_id')->nullable();
            $table->foreign('animales_id')->references('id')->on('animals')->onDelete('set null');
            // Clave foránea del usuario que apadrina. 
            $table->unsignedBigInteger('users_id')->nullable();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apadrinamientos');
    }
};
