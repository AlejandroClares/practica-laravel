<?php

use Illuminate\Database\Seeder;

class PeliculasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table("peliculas")->insert([
            'portada' => '2019-11-27_11-20-34-geminis.jpg',
            'nombre' => 'Géminis',
            'duracion' => '117',
            'anyo' => '2019'
        ]);

        DB::table("peliculas")->insert([
            'portada' => '2019-11-27_11-21-34-joker.jpg',
            'nombre' => 'Joker',
            'duracion' => '122',
            'anyo' => '2019'
        ]);

        DB::table("peliculas")->insert([
            'portada' => '2019-11-27_11-22-57-interstellar.jpg',
            'nombre' => 'Interstellar',
            'duracion' => '169',
            'anyo' => '2014'
        ]);

        DB::table("peliculas")->insert([
            'portada' => '2019-11-27_11-28-23-rambo_v_last_blood.jpg',
            'nombre' => 'Rambo V: Last blood',
            'duracion' => '99',
            'anyo' => '2019'
        ]);

        DB::table("peliculas")->insert([
            'portada' => '2019-11-27_11-24-46-el_rey_leon.jpg',
            'nombre' => 'El Rey Leon',
            'duracion' => '118',
            'anyo' => '2019'
        ]);
        
    }
}
