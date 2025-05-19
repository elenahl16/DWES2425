<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConductorS extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Aqui  vamos a insertar los datos de la tabla Conductors
        DB::table('conductors')->insert([
            'nombre'=>'Carlos',
            'dni'=>'1111111A'
        ]);
        DB::table('conductors')->insert([
            'nombre'=>'Antonia',
            'dni'=>'222222B'
        ]);
        DB::table('conductors')->insert([
            'nombre'=>'Mario',
            'dni'=>'3333333C'
        ]);
        DB::table('conductors')->insert([
            'nombre'=>'Lola',
            'dni'=>'444444D'
        ]);
    }
}
