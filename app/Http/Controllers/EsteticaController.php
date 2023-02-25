<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Estetica;
use App\Models\Socio;
class EsteticaController extends Controller
{   


    //Devuelve una vista que muestra una lista con todos los Admins y todos los Socios
   
    public function index()
    {
        $adminList = Admin::all();
        $socioList = Socio::all();
        return view('estetica.index',["adminList" => $adminList,"socioList" => $socioList]);

    }
    
    //Para usarlo tienes que logearte
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    //Devuelve la vista para dar de alta un admin
    public function create()
    {
     
    }
    
    

   
    public function show($id)
    {
        
   
    }

    //Devuelve la vista para editar un Administrador
    public function edit($id)
    {
 
    }

   //Almacena en la tabla los cambios de un administrasdor a partir de la peticion
    public function update(Request $request, $id)
    {
       
    }

   //Borra un Admin de la tabla
    public function destroy($id)
    {
        
    }
}
