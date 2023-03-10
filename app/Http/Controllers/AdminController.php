<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

//Este es el AdminController, con métodos que devuelven vistas o recuperan datos del modelo.
//Los administradores que dirigen la página (con los que te logeas, son gerentes o recepcionistas)
class AdminController extends Controller
{
    
    public function index()
    {
        //
    }
    //Para usarlo tienes que logearte
    public function __construct()
    {
        $this->middleware('auth');
    }

   
    //Devuelve la vista create.
    public function create()
    {

        //dd("creando admin");
        return view("admin.create");
        
    }

    
    //Crea un nuevo Aministrador a partir de los datos de la peticion enviada por el formulario.
    public function store(Request $request)
    {

        $request->validate([

            "nombre" => "required",
            "email" => "required",
            "password" => "required",
            "puesto"=>"required",
           
        ], [
     
            "nombre.required" => "El nombre es obligatorio",
        
            "password.required" => "El password es obligatorio",
            "email.required" => "El email es obligatorio",
            "puesto.required"=>"El puesto es obligatorio"

        ]);
        $admin = new Admin();

        $admin->nombre = $request->input("nombre");
        $cifrada = password_hash($request->input("password"),PASSWORD_BCRYPT);
        $admin->password= $cifrada;
        $admin->email = $request->input("email");
        $admin->puesto = $request->input("puesto");
        $admin->save();

      
        return redirect()->route('esteticas.index')->with('adminexito', 'administrador creado correctamente');

    }

    
    
    //Recupera un admin a partir de un id dado y lo muestra con una vista
    public function show($id)
    {
        
        $admin = Admin::find($id);
        //$this->authorize('view', $admin);
        return view('admin.show', ['admin' => $admin]);
    }

    
    //Recupera un admin y devuelve la vista para editarlo.
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admin.edit', ['admin' => $admin]);
    }

    
    
    //Actualiza un admin con los campos de la peticion
    public function update(Request $request, $id)
    {
        $request->validate([

            "nombre" => "required",
            "email" => "required",
            "password" => "required",
            "puesto"=>"required",
           
        ], [
     
            "nombre.required" => "El nombre es obligatorio",
        
            "password.required" => "El password es obligatorio",
            "email.required" => "El email es obligatorio",
            "puesto.required"=>"El puesto es obligatorio"

        ]);
        $admin = Admin::find($id);

        $admin->nombre = $request->input("nombre");
        $cifrada = password_hash($request->input("password"),PASSWORD_BCRYPT);
        $admin->password= $cifrada;
        $admin->puesto = $request->input("puesto");
        $admin->email = $request->input("email");

        $admin->save();
        return redirect()->route('esteticas.index')->with("exito", "Modificado exitosamente");
    }

   
    //Busca por id un admin y lo borra de la tabla
    public function destroy($id)
    {
       
        $admin = Admin::find($id);
        $admin->delete();
        return redirect()->route('esteticas.index')->with("borraradminexito", "Administrador eliminado exitosamente");
    }
}
