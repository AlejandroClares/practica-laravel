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
            'portada' => 'http://t0.gstatic.com/images?q=tbn:ANd9GcSmbE6si68cCybprm4rLbFeAfe0oYN1cAEJvoMhZCH16SlXl9gG',
            'nombre' => 'Géminis',
            'duracion' => '117',
            'anyo' => '2019'
        ]);

        DB::table("peliculas")->insert([
            'portada' => 'http://t3.gstatic.com/images?q=tbn:ANd9GcQrGZ9MLLOUkK5Fa-5-zxfyqNdE15-p52rm3ahwac1PSNdfqnxm',
            'nombre' => 'Joker',
            'duracion' => '122',
            'anyo' => '2019'
        ]);

        DB::table("peliculas")->insert([
            'portada' => 'http://t2.gstatic.com/images?q=tbn:ANd9GcQMHMl9U1z1txXWCBgKbSlwH0tV3wVIsxyd6CQLhR0CkgC8Nagf',
            'nombre' => 'Interstellar',
            'duracion' => '169',
            'anyo' => '2014'
        ]);

        DB::table("peliculas")->insert([
            'portada' => 'http://t1.gstatic.com/images?q=tbn:ANd9GcT_7aFzHu5uPrKZoCWmHKDuPnmBytWv5ctteVS1fgOwr77D11ly',
            'nombre' => 'Rambo V: Last blood',
            'duracion' => '99',
            'anyo' => '2019'
        ]);

        DB::table("peliculas")->insert([
            'portada' => 'https://pbs.twimg.com/media/D5_PnnjW4AE4jwL.jpg:large',
            'nombre' => 'El Rey Leon',
            'duracion' => '118',
            'anyo' => '2019'
        ]);
        
    }
}
