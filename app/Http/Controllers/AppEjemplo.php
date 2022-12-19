<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppEjemplo extends Controller
{
  //

  public function mostrarinformacion()
  {
    // $nombremodulo = "dwes";
    //  $ciclo = "DAW";
    //   4 FORMAS DE PASAR DATOS

    //1. 
    /* return view("muestrasignatura",array("nombremodulo"=>"dwes",
                                            "ciclo"=>"DAW"));*/


    //2. 
    /*  return view("muestrasignatura",["nombremodulo"=>"dwes",
         "ciclo"=>"DAW"]);*/


    //3. 
    /*    return view("muestrasignatura")->with(["nombremodulo"=>"dwes",
        "ciclo"=>"DAW"]);*/


    //4. 
    $nombremodulo = "dwes";
    $ciclo = "DAW";

    $departamentos["nombredpto"] = "Informatica";
    $departamentos["ubicacion"] = "Edificio B";
    return view("asignaturas.muestrasignatura", compact("nombremodulo", "ciclo", "departamentos"));
    //return view('asignaturas.page');

  }
}
