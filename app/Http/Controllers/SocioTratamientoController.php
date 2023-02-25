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
            "tratamiento_id.required" => "El tratamiento es obligatorio",
            "fecha.required" => "La fecha es obligatoria",
            "fecha.unique" => "La fecha es unica",


        ]);
        //1. ALMACENAMOS EN BBDD
        //Almacenamos el socio_tratamiento
        $tratamiento = new SocioTratamiento();
        $tratamiento->fecha = $request->input('fecha');
        $tratamiento->socio_id = $request->input('socio_id');
        $tratamiento->tratamiento_id = $request->input('tratamiento_id');

        $tratamiento->save();


       //2. SINCRONIZAMOS DATOS
      

        $socio = Socio::find($request->input("socio_id"));
        
        //Sincronizamos los tratamientos de los socios con el tratamiento_id que acabamos de asignar y añadimos el pivot fecha
        $socio->tratamientos()->syncWithoutDetaching($request->input('tratamiento_id'), ["fecha" => $fecha]);

   


        return redirect()->route('esteticas.index')->with('exito', 'usuario creado correctamente');
    }

    
    public function show($id)
    {
     
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($fecha,$socio_id)
    {
       
        $sociotratamiento = SocioTratamiento::all();

        //Si existe lo borramos (tiene que coincidir fecha y socio_id)
        foreach($sociotratamiento as $st){
            if ($st->socio_id == $socio_id && $st->fecha == $fecha){
            
                $st->delete();   
            }
        }
        
        return redirect()->route('socio.show',['id'=>$socio_id])->with("tratamientoeliminado", "El tratamiento ha sido eliminado y se ha restado al coste total");
    }
}
