<?php

namespace App\Http\Controllers;

use App\Models\Tratamiento;

use App\Models\Socio;
use Illuminate\Http\Request;

//Tratamiento: Hay que darlos de alta para poder asignarlos a los socios.
class TratamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Devuelve la vista create.
    public function create()
    {
        return view("tratamiento.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //Almacena un tratamiento en la base de datos
    public function store(Request $request)
    {
       // Tratamiento::create($request->all());

        $tratamiento = new Tratamiento();
        $tratamiento->nombre=$request->input('nombre');
        $tratamiento->precio=$request->input('precio');
        $tratamiento->tipo=$request->input('tipo');
        $tratamiento->save();
        return redirect()->route('esteticas.index')->with('exito', 'usuario creado correctamente');
    }
    
    //una funcion para asignar el tratamiento con el socio
    public function dartratamiento($id)
    {
        $socio = Socio::find($id);
    
       $tratamientos = Tratamiento::all();
        return view('tratamiento.dartratamiento', ['socio' => $socio,'tratamientos' =>$tratamientos]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
