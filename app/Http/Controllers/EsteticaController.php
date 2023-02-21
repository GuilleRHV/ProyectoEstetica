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
    
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    //Devuelve la vista para dar de alta un admin
    public function create()
    {
        return view("estetica.create");
    }
    
    
    //Devuelve la vista para crear un Socio.
    public function createsocio()
    {
      
        
        return view("estetica.createsocio");
    }
    
    //Devuelve la vista para crear un Tratamiento
    public function createtratamiento()
    {
      
        
        return view("tratamiento.create");
    }

    
    //Almacena un Admin en la tabla a partir de la peticion
    public function store(Request $request)
    {
        Admin::create($request->all());
        return redirect()->route('esteticas.index')->with('exito', 'usuario creado correctamente');
     
    }

    //Almacena un Socio en la tabla a partir de la peticion
    public function storesocio(Request $request)
    {
        Socio::create($request->all());
        return redirect()->route('esteticas.index')->with('exito', 'usuario creado correctamente');
     
    }

   
    public function show($id)
    {
        
   
    }

    //Devuelve la vista para editar un Administrador
    public function edit($id)
    {
        
        $estetica = Admin::find($id);
        return view('estetica.edit', ['estetica' => $estetica]);
    }

   //Almacena en la tabla los cambios de un administrasdor a partir de la peticion
    public function update(Request $request, $id)
    {
        
        $request->validate([

            "nombre" => "required",
            "email" => "required",
            "password" => "required",
           
        ], [
     
            "nombre.required" => "El nombre es obvligatorio",
        
            "password.required" => "El password es obvligatorio",
            "email.required" => "El email es obvligatorio"

        ]);

        $estetica = Admin::find($id);
        
        $estetica->nombre = $request->input("nombre");
        $estetica->password = $request->input("password");
        $estetica->email = $request->input("email");
        $estetica->puesto = $request->input("puesto");

        $estetica->save();
        return redirect()->route('esteticas.index')->with("exito", "Modificado exitosamente");
    }

   //Borra un Admin de la tabla
    public function destroy($id)
    {
        $this->authorize('delete', Estetica::class);
        $estetica = Admin::find($id);
        $estetica->delete();
        return redirect()->route('esteticas.index')->with("exito", "Eliminado exitosamente");
    }
}
