<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Socio;
class SocioController extends Controller
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
    public function create()
    {
        return view("socio.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Socio::create($request->all());
        return redirect()->route('esteticas.index')->with('exito', 'usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $socio = Socio::find($id);
        $dinerototalgastado=0;
        foreach ($socio->tratamientos as $tr){
            $dinerototalgastado=$dinerototalgastado+$tr->precio;
        }
       
        return view('socio.show', ['socio' => $socio,"dinerototalgastado" => $dinerototalgastado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $socio = Socio::find($id);
        return view('socio.edit', ['socio' => $socio]);
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
        $request->validate([

            "nombre" => "required",
            "apellidos" => "required",
            "edad" => "required",
            "telefono" => "required",
           
        ], [
     
            "nombre.required" => "El nombre es obvligatorio",
            "telefono.required" => "El telefono es obvligatorio",
            "edad.required" => "El edad es obvligatorio",
            "apellidos.required" => "El apellidos es obvligatorio"

        ]);

        $socio = Socio::find($id);
        
        $socio->nombre = $request->input("nombre");
        $socio->apellidos = $request->input("apellidos");
        $socio->edad = $request->input("edad");
        $socio->telefono = $request->input("telefono");

        $socio->save();
        return redirect()->route('esteticas.index')->with("exito", "Modificado exitosamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $socio = Socio::find($id);
        $socio->delete();
        return redirect()->route('esteticas.index')->with("exito", "Eliminado exitosamente");
    }
}
