<?php

use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table("usuarios")->insert([
            'nombre' => 'Admin',
            'passwd' => '1234',
            'email' => 'admin@gmail.com'
        ]);
    }
}
