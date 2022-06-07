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
        Schema::create('donativos', function (Blueprint $table) {
            $table->id()->onDelete('set null');
            $table->date('fecha');
            $table->integer('importe');
            $table->enum('tipo', ['Transferencia bancaria', 'Bizum' , 'Tarjeta', 'Teaming', 'Facebook', 'Instagram', 'Paypal']);
            $table->string('usuario_instagram')->nullable();
            $table->string('usuario_facebook')->nullable();
            $table->string('DNI');
            $table->enum('pago_confirmado', ['Sí', 'No'])->default('No');
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
        Schema::dropIfExists('donativos');
    }
};
