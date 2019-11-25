<?php

use Illuminate\Database\Seeder;

class PersonasActoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // actores para:
        //gemini
        $actores1 = ['19', '20', '21'];
        foreach ($actores1 as $value) {
            DB::table("personas_actores")->insert([
                'peliculas_id' => '1',
                'personas_id' => $value
            ]);
        }

        // joker
        $actores2 = ['10', '11', '12'];
        foreach ($actores2 as $value) {
            DB::table("personas_actores")->insert([
                'peliculas_id' => '2',
                'personas_id' => $value
            ]);
        }

        //interstellar
        $actores3 = ['14', '15', '16', '17'];
        foreach ($actores3 as $value) {
            DB::table("personas_actores")->insert([
                'peliculas_id' => '3',
                'personas_id' => $value
            ]);
        }

        //rambo
        $actores4 = ['2', '3', '4'];
        foreach ($actores4 as $value) {
            DB::table("personas_actores")->insert([
                'peliculas_id' => '4',
                'personas_id' => $value
            ]);
        }

        // El rey leon
        $actores5 = ['6', '7', '8'];
        foreach ($actores5 as $value) {
            DB::table("personas_actores")->insert([
                'peliculas_id' => '5',
                'personas_id' => $value
            ]);
        }
        
    }
}
