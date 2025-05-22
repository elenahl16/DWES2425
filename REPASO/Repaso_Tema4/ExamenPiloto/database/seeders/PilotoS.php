<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PilotoS extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pilotos')->insert([
            'nombre'=>'Fernando Alonso',
            'nacionalidad'=>'Español',
            'escuderia'=>'Ferrari'

        ]);
        DB::table('pilotos')->insert([
            'nombre'=>'Lewis Hamilton',
            'nacionalidad'=>'Britanico',
            'escuderia'=>'Ford'

        ]);
        DB::table('pilotos')->insert([
            'nombre'=>'Lola Landon',
            'nacionalidad'=>'Aleman',
            'escuderia'=>'McLaren'

        ]);
    }
}
