<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LibroS extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //aqui lo que vamos hacer es añadir los libros
        DB::table('libros')->insert([
            'titulo'=>'Canciones para Paula',
            'autor'=>'Paula Fernández',
            'num_ejemplares'=>2,
            'fechaPublicacion'=>'2022-03-24'
        ]);
        DB::table('libros')->insert([
            'titulo'=>'La cueva de los Alibaba',
            'autor'=>'Rocio Letrosa',
            'num_ejemplares'=>1,
            'fechaPublicacion'=>'2019-01-07'
        ]);
        DB::table('libros')->insert([
            'titulo'=>'Los tocaPelotas',
            'autor'=>'Fernando Esteso',
            'num_ejemplares'=>4,
            'fechaPublicacion'=>'2025-08-08'
        ]);
    }
}
