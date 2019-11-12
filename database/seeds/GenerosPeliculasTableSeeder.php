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
        DB::table("generos_peliculas")->insert([
            'generos_id' => '1',
            'peliculas_id' => '1'
        ]);
        DB::table("generos_peliculas")->insert([
            'generos_id' => '2',
            'peliculas_id' => '1'
        ]);
    }
}
