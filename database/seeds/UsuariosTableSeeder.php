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
        for($i = 0; $i < 10; $i++){
            $nick = "usuario".($i+1);
            $email = $nick."@gmail.com";
            DB::table("usuarios")->insert([
                'nick' => $nick,
                'passwd' => '1234',
                'nombre' => 'Usuario',
                'apellidos' => 'Ape Usuario',
                'email' => $email
            ]);
        }
    }
}
