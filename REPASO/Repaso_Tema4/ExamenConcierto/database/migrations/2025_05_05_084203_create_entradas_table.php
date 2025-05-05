<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Type\Integer;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //aqui vamos a ir añadiendo los campos que tienen la tabla entradas
            $table->string('email')->nullable(false);
            $table->foreignId('concierto_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->Integer('numEntradas')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entradas');
    }
};
