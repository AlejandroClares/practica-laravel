<?php 

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;

class Hola extends Controller{

    public function show($nombre){
        $data["nombre"] = $nombre;
        return view("hola", $data);
    }

}