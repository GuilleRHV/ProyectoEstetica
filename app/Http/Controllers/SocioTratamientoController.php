<?php

namespace App\Http\Controllers;

use App\Models\SocioTratamiento;
use App\Models\Tratamiento;
use App\Models\Socio;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SocioTratamientoController extends Controller
{
    
    public function index()
    {
        //
    }

    
    public function create()
    {
        //
    }

    
    //almacena una fila de la tabla socioTratamiento que relaciona socios con tratamientos en una fecha
    public function store(Request $request)
    {

        


        $fecha = $request->input('fecha');
        $socio_id = $request->input('socio_id');



        $request->validate([

            "socio_id" => "required",
            "tratamiento_id" => "required",
            "fecha" => [
                "required",
                //No puede haber un socio con 2 tratamientos el mismo dia
                Rule::unique("socio_tratamiento")->where(function ($query) use ($fecha, $socio_id) {
                    return $query->where("socio_id", $socio_id)->where("fecha", $fecha);
                })
            ],



        ], [
            "socio_id.required" => "El socio_id es obligatorio",
            "tratamiento_id.required" => "El tratamiento_id es obligatorio",
            "fecha.required" => "La fecha es obligatoria",
            "fecha.unique" => "La fecha es unica",


        ]);
        //Almacenamos el socio_tratamiento
        $tratamiento = new SocioTratamiento();
        $tratamiento->fecha = $request->input('fecha');
        $tratamiento->socio_id = $request->input('socio_id');
        $tratamiento->tratamiento_id = $request->input('tratamiento_id');


        $tratamiento->save();


       
      

        $socio = Socio::find($request->input("socio_id"));
        
        $socio->tratamientos()->syncWithoutDetaching($request->input('tratamiento_id'), ["fecha" => $fecha]);

   


        return redirect()->route('esteticas.index')->with('exito', 'usuario creado correctamente');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
