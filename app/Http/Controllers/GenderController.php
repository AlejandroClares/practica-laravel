<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Generos;

class GenderController extends Controller
{

    public function __construct(){
        // Solo pueden acceder usuarios autenticados
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['datosGeneros'] = Generos::all();
        return view('gender/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gender/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gender = new Generos($request->all());
        $gender->save();
        return redirect()->route('gender.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['datosGenero'] = Generos::find($id);
        return view('gender/show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['datosGenero'] = Generos::find($id);
        return view('gender/edit', $data);
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
        $gender = Generos::find($id);
        $gender->fill($request->all());
        $gender->save();
        return redirect()->route('gender.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Generos::destroy($id);
        return redirect()->route('gender.index');
    }

    /**
     * Muestra la vista generada para la ventana modal 
     * 
     * @return view
     */
    public function modalForm(){
        echo view("gender.modal.createModal");
    }

    /**
     * Guarda el genero y devuelve los datos actualizados de generos.
     * 
     * @param  Request $r
     * @return view
     */
    public function modalFormStore(Request $r){
        $gender = new Generos();
        $gender->nombre = $r->nombre;
        $gender->save();
        $data["datosGenero"] = Generos::where('nombre', $r->nombre)->get(); 
        return view('gender.modal.refreshGenderList', $data);
    }
}
