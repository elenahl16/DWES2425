<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void{
        //aqui es donde vamos crear las migraciones para crear nuestra base de dato
        //tenemos que ir poniendo los datos que va a formar nuestra tabla

        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('fecha');
            //aqui definimos la clave externa que une con la tabla libros
            $table->foreignId('libro_id')->constrained() ->onUpdate('cascade')->onDelete('restrict');
            $table->string('nombreCliente');
            //nullable lo que hace es permitir que esta columna admita valores nulos
            $table->date('fechaDevolucion')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
