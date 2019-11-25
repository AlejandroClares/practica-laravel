<?php

use Illuminate\Database\Seeder;

class GenerosPeliculasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generos de:
        // geminis
        DB::table("generos_peliculas")->insert([
            'generos_id' => '4',
            'peliculas_id' => '1'
        ]);
        DB::table("generos_peliculas")->insert([
            'generos_id' => '7',
            'peliculas_id' => '1'
        ]);
        DB::table("generos_peliculas")->insert([
            'generos_id' => '3',
            'peliculas_id' => '1'
        ]);

        // joker
        DB::table("generos_peliculas")->insert([
            'generos_id' => '6',
            'peliculas_id' => '2'
        ]);
        DB::table("generos_peliculas")->insert([
            'generos_id' => '3',
            'peliculas_id' => '2'
        ]);
        DB::table("generos_peliculas")->insert([
            'generos_id' => '5',
            'peliculas_id' => '2'
        ]);

        // Interstellar
        DB::table("generos_peliculas")->insert([
            'generos_id' => '2',
            'peliculas_id' => '3'
        ]);
        DB::table("generos_peliculas")->insert([
            'generos_id' => '3',
            'peliculas_id' => '3'
        ]);
        DB::table("generos_peliculas")->insert([
            'generos_id' => '7',
            'peliculas_id' => '3'
        ]);

        //Rambo
        DB::table("generos_peliculas")->insert([
            'generos_id' => '4',
            'peliculas_id' => '4'
        ]);
        DB::table("generos_peliculas")->insert([
            'generos_id' => '2',
            'peliculas_id' => '4'
        ]);
        DB::table("generos_peliculas")->insert([
            'generos_id' => '5',
            'peliculas_id' => '4'
        ]);

        //El rey leon
        DB::table("generos_peliculas")->insert([
            'generos_id' => '1',
            'peliculas_id' => '5'
        ]);
        DB::table("generos_peliculas")->insert([
            'generos_id' => '2',
            'peliculas_id' => '5'
        ]);
        DB::table("generos_peliculas")->insert([
            'generos_id' => '3',
            'peliculas_id' => '5'
        ]);
    }
}
