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
        Schema::create('conductors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //aqui vamos a ir añadiendo los campos que tienen la tabla conductor
            $table->string('nombre')->nullable(false);
            $table->string('dni')->nullable(false)->unique; //? nullable indica que no admite nulos y lo ponemos a false, que sea unica
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conductors');
    }
};
