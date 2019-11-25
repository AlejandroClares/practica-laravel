<?php

use Illuminate\Database\Seeder;

class GenerosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            'Animación',
            'Aventura', 
            'Drama',
            'Acción',
            'Suspense',
            'Crimen',
            'Ciencia ficción'
        ];
        foreach ($genres as $genre) {
            DB::table("generos")->insert([
                'nombre' => $genre
            ]);
        }
    }
}
