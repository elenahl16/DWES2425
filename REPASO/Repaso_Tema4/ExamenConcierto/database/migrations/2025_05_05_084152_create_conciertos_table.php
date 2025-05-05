<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('conciertos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //aqui vamos a ir añadiendo los campos que tienen la tabla conciertos

            $table->string('titulo')->nullable(false)->unique; //? nullable indica que no admite nulos y lo ponemos a false
            $table->date('fecha');
            $table->integer('aforo')->nullable(false);
            $table->float('precioEntrada')->nullable(false)->default(10);//? asi asignariamos el valor por defecto de precioEntrada
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conciertos');
    }
};
