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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('DNI')->unique();
            $table->string('nombre');
            $table->string('primer_apellido');
            $table->string('segundo_apellido');
            $table->date('fecha_nacimiento');
            $table->string('pais_residencia');
            $table->string('domicilio');
            $table->integer('codigo_postal');
            $table->string('poblacion');
            $table->integer('telefono');
            $table->enum('consentimiento_imagenes', ['Sí', 'No']);
            $table->enum('consentimiento_comunicaciones', ['Sí', 'No']);
            $table->enum('rol', ['Usuario', 'Administrador', 'Contable', 'Veterinario', 'Recursos humanos'])->default('Usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
