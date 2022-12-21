<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsignaturaController extends Controller
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
        //Llama al formulario de alto de una asignatura
        
        return view('asignaturas.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Recoge los datos del formulario de alta
        //Aqui iria la logica de insertar en la bbdd.  save(modelo)
        
        $datos = $request->validate(

            ['nombre'=>'required|max:7',
            'curso'=>'required|integer | regex:/[1-2]/',
            'ciclo'=>'required|size:3|regex: /DA[M,W]/'
        ],[
        'nombre.max'=>'El nombre no puede ser mas de 7 caracteres',
        'nombre.required'=>'Debes rellenar el nombre',
        'ciclo.required'=>'Debes rellenar el ciclo',
        'curso.required'=>'Debes rellenar el curso',
        'curso.integer'=>'El curso debe de ser numero entero',
        'curso.regex'=>'El curso debe estar comprendido entre 1 y 2',
       'ciclo.regex'=>'El ciclo debe ser DAM o DAW',
       'ciclo.size'=>'El ciclo debe ser DAM o DAW'
    ]);
        
        /*$nombre = $request->input('nombre');
        $curso = $request->input('curso');
        $ciclo = $request->input('ciclo');
        $comentario = $request->input('comentario');
        */
        //$datos = $request->all();

        //$datos = $request->except('nombre');
        //$datos = $request->only('nombre', 'curso', 'ciclo', 'comentario');
        //dd($nombre, $curso, $ciclo, $comentario); //Los muestro
        /*$nuevocampo="";
        if($request->has('nuevocampo')){
            dd($nuevocampo);
        }else{
            dd("No existe el campo");
        }*/
        dd($datos);
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
