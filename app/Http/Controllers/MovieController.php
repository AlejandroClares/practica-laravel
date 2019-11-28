<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

//Models
use App\Peliculas;
use App\Generos;
use App\Personas;

class MovieController extends Controller
{

    public function __construct(){
        
        // Los invitados solo pueden usar los metodos especificados.
        $this->middleware("auth")->except("index", "show", "search", "searchDirector", "searchActor", "searchGender");
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($movies = null)
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
            'nombre' => 'required',
            'portada' => 'required|image',
            'duracion' => 'required|numeric',
            'anyo' => 'required|numeric',
            'directores' => 'required',
            'generos' => 'required'
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
            'nombre' => 'required',
            'portada' => 'image',
            'duracion' => 'required|numeric',
            'anyo' => 'required|numeric',
            'directores' => 'required',
            'generos' => 'required'
        ]);

        // Se busca la pelicula a modificar
        $movie = Peliculas::find($id);
        $movie->fill($request->all());

        $file = $request->file('portada');
        if($file != null){
            $name = $file->getClientOriginalName();
            $date = date("Y-m-d_H-i-s");
            $date = $date."-".$name;
            Storage::disk('portada')->put($date, File::get($file));
            $movie->portada = $date;
        }
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
        
        // Elimina la portada almacenada en el servidor
        Storage::disk('portada')->delete($peli->portada);
        Peliculas::destroy($id);

        // Se devuelve 1 para que ajax sepa que a funcionado.
        echo "1";
    }

    /**
     * Devuelve las peliculas segun el titulo
     *
     * @param  string  $criterio
     * @return \Illuminate\Http\Response
     */
    public function search($criterio){
        
        $data['datosPeliculas'] = DB::table('peliculas')
        ->where('peliculas.nombre', 'like', '%'.$criterio.'%')
        ->select('peliculas.*')
        ->get();
        
        if(isset($data['datosPeliculas'][0])){
            return view('movie/viewsAjax/moviesSearch', $data);
        } else {
            echo "0";
        }
    }

    /**
     * Busqueda de peliculas donde participe el director
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function searchDirector($id){

        //Busca la pelicula en la que trabaje el id del director.
        $data['datosPeliculas'] = DB::table('peliculas')
        ->join('personas_directores', 'peliculas.id', '=', 'personas_directores.peliculas_id')
        ->join('personas', 'personas_directores.personas_id', '=', 'personas.id')
        ->where('personas.id', '=', $id)
        ->select('peliculas.*')
        ->get();
    
        return view('movie/index', $data);
    }
    
    /**
     * Busqueda de peliculas donde participe el actor
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function searchActor($id){
        
        $data['datosPeliculas'] = DB::table('peliculas')
        ->join('personas_actores', 'peliculas.id', '=', 'personas_actores.peliculas_id')
        ->join('personas', 'personas_actores.personas_id', '=', 'personas.id')
        ->where('personas.id', '=', $id)
        ->select('peliculas.*')
        ->get();
    
        return view('movie/index', $data);
    }

    /**
     * Busqueda de peliculas donde contenga el genero
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function searchGender($id){
        
        $data['datosPeliculas'] = DB::table('peliculas')
        ->join('generos_peliculas', 'peliculas.id', '=', 'generos_peliculas.peliculas_id')
        ->join('generos', 'generos_peliculas.generos_id', '=', 'generos.id')
        ->where('generos.id', '=', $id)
        ->select('peliculas.*')
        ->get();
    
        return view('movie/index', $data);
    }
}
