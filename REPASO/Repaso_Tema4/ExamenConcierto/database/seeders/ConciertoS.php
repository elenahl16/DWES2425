<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConciertoS extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        //En el seeder lo que vamos hacer es insertar datos a la tabla concierto

        DB::table ('conciertos')->insert([
            'titulo'=>'La Momia2',
            'fecha'=>'2025-05-19',
            'aforo'=>100,
            'precioEntrada'=>10
        ]);
        DB::table ('conciertos')->insert([
            'titulo'=>'Ariadna es mala y puta',
            'fecha'=>'2025-05-05',
            'aforo'=>400,
            'precioEntrada'=>2

        ]);
    }
}