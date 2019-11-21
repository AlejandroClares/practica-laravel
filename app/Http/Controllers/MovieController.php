<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Models
use App\Peliculas;
use App\Generos;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $data['datosGeneros'] = Generos::all();
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
        $movie = new Peliculas($request->all());
        $movie->save();
        $movie->generos()->attach($request->generos);
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
        $data["datosPelicula"] = Peliculas::find($id);
        $data["datosGenero"] = Peliculas::find($id)->generos;
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
        $data['datosPelicula'] = Peliculas::find($id);
        $data['generosPelicula'] = $data['datosPelicula']->generos;
        $data['datosGeneros'] = Generos::all();
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
        $movie = Peliculas::find($id);
        $movie->fill($request->all());
        $movie->save();
        $movie->generos()->sync($request->generos);
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
        $peli = Peliculas::find($id);
        $peli->generos()->detach();
        Peliculas::destroy($id);
        echo "1";
    }
}
