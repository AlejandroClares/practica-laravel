<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

//Models
use App\Peliculas;
use App\Generos;
use App\Personas;

class MovieController extends Controller
{

    public function __construct(){
        
        // Los invitados solo pueden ver index y show
        // $this->middleware("guest")->only("index", "show");

        $this->middleware("auth")->except("index", "show");
        /*
        * CUIDADO
        * La linea anterior permite entrar a los invitades en ambos metodos
        * pero bloquea al usuario auth.
        */
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Se obtienen todas las peliculas
        $data['datosPeliculas'] = Peliculas::all();
        return view("movie/index", $data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Se obtienen todos los generos.
        $data['datosGeneros'] = Generos::all();
        $data['datosPersonas'] = Personas::all();
        return view("movie/form", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // Se valida el formulario
        $request->validate([
            // 'portada' => 'required',
            'nombre' => 'required',
            'duracion' => 'required|numeric',
            'anyo' => 'required|numeric',
            'generos' => 'required',
            'directores' => 'required'
        ]);

        // Se crea la pelicula y se añaden todos los campos. 
        $movie = new Peliculas($request->all());

        $file = $request->file('portada');
        $name = $file->getClientOriginalName();
        $date = date("Y-m-d_H-i-s");
        $date = $date."-".$name;
        Storage::disk('portada')->put($date, File::get($file));
        $movie->portada = $date;

        $movie->save();

        // Se crean las tuplas de la tabla intermedia enlazando los generos de la pelicula
        $movie->generos()->attach($request->generos);
        $movie->directores()->attach($request->directores);
        $movie->actores()->attach($request->actores);
        return redirect()->route('movie.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        
        // Se obtiene la pelicula y los generos a los que pertence
        $peli = Peliculas::find($id);
        $data["datosPelicula"] = $peli;
        $data["datosGenero"] = $peli->generos;
        $data["datosDirector"] = $peli->directores;
        $data["datosActor"] = $peli->actores;
        return view('movie/show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Se obtiene la pelicula, los datos a los que pertenece y todos los generos que existen
        $peli = Peliculas::find($id);
        $data['datosPelicula'] = $peli;
        $data['generosPelicula'] = $peli->generos;
        $data['directoresPelicula'] = $peli->directores;
        $data['actoresPelicula'] = $peli->actores;
        $data['datosGeneros'] = Generos::all();
        $data['datosPersonas'] = Personas::all();
        return view('movie/form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Se valida el formulario
        $request->validate([
            'portada' => 'required',
            'nombre' => 'required',
            'duracion' => 'required|numeric',
            'anyo' => 'required|numeric',
            'generos' => 'required'
        ]);

        // Se busca la pelicula a modificar
        $movie = Peliculas::find($id);
        $movie->fill($request->all());
        $file = $request->file('portada');
        $name = $file->getClientOriginalName();
        $date = date("Y-m-d_H-i-s");
        $date = $date."-".$name;
        Storage::disk('portada')->put($date, File::get($file));
        $movie->portada = $date;
        $movie->save();

        // Si la tabla intermedia que contiene los generos a los que pertenece la pelicula
        $movie->generos()->sync($request->generos);
        $movie->directores()->sync($request->directores);
        $movie->actores()->sync($request->actores);
        return redirect()->route('movie.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /* Se busca la pelicula y se eliminan todos los
        generos a los que pertenece. */
        $peli = Peliculas::find($id);
        $peli->generos()->detach();
        $peli->directores()->detach();
        $peli->actores()->detach();
        Storage::disk('portada')->delete($peli->portada);
        Peliculas::destroy($id);

        // Se devuelve 1 para que ajax sepa que a funcionado.
        echo "1";
    }
}
