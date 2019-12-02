<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Modelos
use App\Personas;

class PersonController extends Controller
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
        // Se obtienen todas las personas
        $data['datosPersonas'] = Personas::all();
        return view('person/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('person/create');
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
            'nombre' => 'required'
        ]);

        // Se crea la persona y se añaden todos los campos. 
        $person = new Personas($request->all());
        $person->save();

        return redirect()->route('person.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Se obtiene la persona
        $data["datosPersona"] = Personas::find($id);
        return view('person/show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Se obtiene la persona y los datos a los que pertenece.
        $data['datosPersona'] = Personas::find($id);
        return view('person.edit', $data);
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
            'nombre' => 'required'
        ]);

        // Se busca la persona a modificar
        $person = Personas::find($id);
        $person->fill($request->all());
        $person->save();

        return redirect()->route('person.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $person = Personas::find($id);
        Personas::destroy($id);
        return redirect()->route('person.index');
    }

    /**
     * Muestra la vista generada para la ventana modal 
     * 
     * @return view
     */
    public function modalForm(){
        echo view("person.modal.createModal");
    }

    /**
     * Guarda la persona y devuelve los datos actualizados de personas.
     * 
     * @param  Request $r
     * @return view
     */
    public function modalFormStore(Request $r){
        $gender = new Personas();
        $gender->nombre = $r->nombre;
        $gender->save();
        $data["datosPersona"] = Personas::where('nombre', $r->nombre)->get(); 
        return view('person.modal.refreshPersonList', $data);
    }
}
