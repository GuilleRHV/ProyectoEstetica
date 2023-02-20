<?php

namespace App\Http\Controllers;

use App\Models\SocioTratamiento;
use App\Models\Tratamiento;
use App\Models\Socio;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
    //almacena una fila de la tabla socioTratamiento
    public function store(Request $request)
    {

        //$lista = SocioTratamiento::all();
        /*$repetido = false;
        foreach ( $lista as $l){
            if ($l->socio_id==$request->input('socio_id') && $l->fecha==$request->input('fecha')){
                $repetido=true;
            }
        }*/


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


        //ENLAZAR (SYNCWITHOUTDETACHING O ATTACH)

      
           // $soc->tratamientos()->sync
      

        $socio = Socio::find($request->input("socio_id"));
        // $socio->tratamientos()->syncWithPivotValues($request->input('tratamiento_id'), ["fecha" => $fecha]);

     //   syncWithoutDetaching 

        $socio->tratamientos()->syncWithoutDetaching($request->input('tratamiento_id'), ["fecha" => $fecha]);

   //     $trat = Tratamiento::find($request->input('tratamiento_id'));
    //    $trat->socios()->attach($request->input('socio_id'), ["fecha" => $fecha]);


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
