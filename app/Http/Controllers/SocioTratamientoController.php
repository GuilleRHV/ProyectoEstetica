<?php

namespace App\Http\Controllers;

use App\Models\SocioTratamiento;
use Illuminate\Http\Request;

class SocioTratamientoController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $lista = SocioTratamiento::all();
        /*$repetido = false;
        foreach ( $lista as $l){
            if ($l->socio_id==$request->input('socio_id') && $l->fecha==$request->input('fecha')){
                $repetido=true;
            }
        }*/



        $request->validate([

            "socio_id" => "required|unique:socio_tratamientos,fecha",
            "tratamiento_id" => "required",
            "fecha" => "required|unique:socio_tratamientos,socio_id"
            //"fecha" => "required|unique:socio_tratamientos,fecha,".$request->input("fecha")."|unique:socio_tratamientos,socio_id,".$request->input("socio_id")
           
        ], [
            "socio_id.required" => "El socio_id es obligatorio",
            "tratamiento_id.required" => "El tratamiento_id es obligatorio",
            "fecha.required" => "La fecha es obligatoria",
            "fecha.unique" => "La fecha es unica",
        

        ]);

        $tratamiento = new SocioTratamiento();
        $tratamiento->fecha=$request->input('fecha');
        $tratamiento->socio_id=$request->input('socio_id');
        $tratamiento->tratamiento_id=$request->input('tratamiento_id');


        if($tratamiento->save()){
            return redirect()->route('esteticas.index')->with('exito', 'usuario creado correctamente');
        }else{
            return redirect()->route('tratamiento.dartratamiento')->with('exito', 'usuario creado correctamente');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
