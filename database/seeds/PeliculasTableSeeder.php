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
        for($i = 0; $i < 10; $i++){
            $portada = 'Portada'.($i+1);
            $nombre = 'Nombre'.($i+1);
            DB::table("peliculas")->insert([
                'portada' => $portada,
                'nombre' => $nombre,
                'duracion' => '90',
                'anyo' => '1990'
            ]);
        }
    }
}
