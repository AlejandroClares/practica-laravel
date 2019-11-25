<?php

use Illuminate\Database\Seeder;

class PersonasDirectoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {            
            DB::table("personas_directores")->insert([
                'peliculas_id' => '1',
                'personas_id' => '18'
            ]);
            DB::table("personas_directores")->insert([
                'peliculas_id' => '2',
                'personas_id' => '9'
            ]);
            DB::table("personas_directores")->insert([
                'peliculas_id' => '3',
                'personas_id' => '13'
            ]);
            DB::table("personas_directores")->insert([
                'peliculas_id' => '4',
                'personas_id' => '1'
            ]);
            DB::table("personas_directores")->insert([
                'peliculas_id' => '5',
                'personas_id' => '5'
            ]);
    }
}
