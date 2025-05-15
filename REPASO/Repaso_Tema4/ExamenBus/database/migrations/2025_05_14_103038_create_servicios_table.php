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
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //aqui vamos a ir añadiendo los campos que tiene la tabla servicios
            $table->foreignId('conductor_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->date('fecha')->nullable(false);
            $table->float('recaudacion')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }
};
