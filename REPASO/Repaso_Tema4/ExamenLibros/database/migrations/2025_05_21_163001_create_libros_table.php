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
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //aqui vamos añadir los campo que tiene la tabla

            $table->string('titulo')->nullable(false);
            $table->string('autor')->nullable(false);
            $table->integer('num_ejemplares')->nullable(false);
            $table->date('fechaPublicacion')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
