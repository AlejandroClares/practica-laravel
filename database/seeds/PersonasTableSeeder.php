<?php

use Illuminate\Database\Seeder;

class PersonasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("personas")->insert([
            'nombre' => 'Juanito'
        ]);
        DB::table("personas")->insert([
            'nombre' => 'Paco'
        ]);
    }
}
