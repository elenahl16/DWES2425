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
        Schema::create('billetes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //aqui vamos a ir añadiendo los campos que tiene la tabla billetes
            $table->foreignId('servicio_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->time('hora')->nullable(false);
            $table->float('precio')->nullable(false);
            $table->boolean('anulado')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billetes');
    }
};
