<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudyController extends Controller
{
    //
    public function index ()
    {
     echo "En index de estudios";
    }

    public function create(){
    
        echo "Metodo create";
    }
    public function show($id)
    {
        # code...
        echo "Estudio nº " .$id;
    }

    public function edit($id)
    {
        echo "Edit de " . $id;
    }

    
}
