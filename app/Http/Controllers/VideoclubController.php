<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoclubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    static $peliculas =[];
    public function gethome()
    {
        //return view('home.blade.php');
        dd("func");
    }
    public function index()
    {
        //

        return view('videoclub.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function login(){
        //return view('videoclub.index');
        dd("login");
    }
    public function create()
    {
        //
        

        return view("videoclub.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       // $datos = $request->only('titulo','director');
        $titulo = $request->input('titulo');
        $director = $request->input('director');
        $pelicula = [$titulo,$director];
        self::$peliculas[]=$pelicula;
        //dd("Titulo de la pelicula: $titulo | nombre del director: $director ");
        $peliculas=self::$peliculas;
      //  dd(self::$peliculas);
        return view('videoclub.login', ['peliculas'=>$peliculas]);

    }


    public function catalog(){
        //dd("pruieba");
        dd(self::$peliculas);
        dd("aa");
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
