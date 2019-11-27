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
            'anyo' => '2019',
            'sinopsis' => 'Henry Brogan, un asesino a sueldo ya demasiado mayor para seguir con su duro trabajo, decide retirarse. Pero esto no le va a resultar tan fácil, pues tendrá que enfrentarse a un clon suyo, mucho más joven.',
            'url_trailer' => 'https://www.youtube.com/embed/yF-6aUHkSJk'
        ]);

        DB::table("peliculas")->insert([
            'portada' => '2019-11-27_11-35-25-joker.jpg',
            'nombre' => 'Joker',
            'duracion' => '122',
            'anyo' => '2019',
            'sinopsis' => 'Arthur Fleck (Phoenix) vive en Gotham con su madre, y su única motivación en la vida es hacer reír a la gente. Actúa haciendo de payaso en pequeños trabajos, pero tiene problemas mentales que hacen que la gente le vea como un bicho raro. Su gran sueño es actuar como cómico delante del público, pero una serie de trágicos acontecimientos le hará ir incrementando su ira contra una sociedad que le ignora.',
            'url_trailer' => 'https://www.youtube.com/embed/ygUHhImN98w'
        ]);

        DB::table("peliculas")->insert([
            'portada' => '2019-11-27_11-22-57-interstellar.jpg',
            'nombre' => 'Interstellar',
            'duracion' => '169',
            'anyo' => '2014',
            'sinopsis' => 'Al ver que la vida en la Tierra está llegando a su fin, un grupo de exploradores liderados por el piloto Cooper (McConaughey) y la científica Amelia (Hathaway) se embarca en la que puede ser la misión más importante de la historia de la humanidad y emprenden un viaje más allá de nuestra galaxia en el que descubrirán si las estrellas pueden albergar el futuro de la raza humana.',
            'url_trailer' => 'https://www.youtube.com/embed/UoSSbmD9vqc'
        ]);

        DB::table("peliculas")->insert([
            'portada' => '2019-11-27_11-28-23-rambo_v_last_blood.jpg',
            'nombre' => 'Rambo V: Last blood',
            'duracion' => '99',
            'anyo' => '2019',
            'sinopsis' => 'Después de haber vivido un infierno, John Rambo se retira a su rancho familiar. Su descanso se ve interrumpido por la desaparición de su ahijada tras cruzar la frontera con México. El veterano de guerra emprende un peligroso viaje en su busca, enfrentándose a uno de los carteles más despiadados de la zona. Así descubre que, tras la desaparición de la chica, hay oculta una red de trata de blancas. Con sed de venganza, deberá cumplir una última misión desplegando de nuevo sus habilidades para el combate.',
            'url_trailer' => 'https://www.youtube.com/embed/_wXjrXAmZLE'
        ]);

        DB::table("peliculas")->insert([
            'portada' => '2019-11-27_11-24-46-el_rey_leon.jpg',
            'nombre' => 'El Rey Leon',
            'duracion' => '118',
            'anyo' => '2019',
            'sinopsis' => 'Tras el asesinato de su padre, un joven león abandona su reino para descubrir el auténtico significado de la responsabilidad y de la valentía. Remake de “El Rey León”, dirigido y producido por Jon Favreau, responsable de la puesta al día, con el mismo formato, de “El libro de la selva” (2016).',
            'url_trailer' => 'https://www.youtube.com/embed/mb79ctR-E-c'
        ]);
        
    }
}
