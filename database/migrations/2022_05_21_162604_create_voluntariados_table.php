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
        Schema::create('voluntariados', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo', ['Diario', 'Digital', 'Puntual']);
            $table->string('disponibilidad');
            $table->enum('coche_propio', ['Sí', 'No'])->nullable();
            $table->string('tareas');
            // Clave foránea para vincularlo a un usuario registrado. 
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
        Schema::dropIfExists('voluntariados');
    }
};
