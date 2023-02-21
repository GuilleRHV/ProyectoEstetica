<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Estetica;
use App\Models\Socio;
class EsteticaController extends Controller
{   


    
   
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

    
    
    public function create()
    {
        return view("estetica.create");
    }
    public function createsocio()
    {
      
        
        return view("estetica.createsocio");
    }

    public function createtratamiento()
    {
      
        
        return view("tratamiento.create");
    }

    
    public function store(Request $request)
    {
        Admin::create($request->all());
        return redirect()->route('esteticas.index')->with('exito', 'usuario creado correctamente');
     
    }


    public function storesocio(Request $request)
    {
        Socio::create($request->all());
        return redirect()->route('esteticas.index')->with('exito', 'usuario creado correctamente');
     
    }

   
    public function show($id)
    {
        
   
    }

    
    public function edit($id)
    {
        
        $estetica = Admin::find($id);
        return view('estetica.edit', ['estetica' => $estetica]);
    }

   
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

   
    public function destroy($id)
    {
        $this->authorize('delete', Estetica::class);
        $estetica = Admin::find($id);
        $estetica->delete();
        return redirect()->route('esteticas.index')->with("exito", "Eliminado exitosamente");
    }
}
