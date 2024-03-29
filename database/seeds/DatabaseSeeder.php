<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsuariosTableSeeder::class);
        $this->call(PeliculasTableSeeder::class);
        $this->call(GenerosTableSeeder::class);
        $this->call(GenerosPeliculasTableSeeder::class);
        $this->call(PersonasTableSeeder::class);
        $this->call(PersonasDirectoresTableSeeder::class);
        $this->call(PersonasActoresTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
