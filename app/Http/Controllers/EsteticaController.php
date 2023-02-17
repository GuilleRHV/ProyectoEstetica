<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Estetica;
use App\Models\Socio;
class EsteticaController extends Controller
{   


    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminList = Admin::all();
        $socioList = Socio::all();
        return view('estetica.index',["adminList" => $adminList,"socioList" => $socioList]);

    }

    /*public function credenciales(Request $request)
    {

        $datos = $request->all();
        $valido = false;
        $admins = Admin::all();

        foreach ($admins as $admin) {
            if ($admin->email == $datos['email'] && $admin->password == $datos['password']) {
                $valido = true;
            }
        }

        if ($valido) {
            return view('esteticas.index');
        } 
        return view('esteticas.login');

    }*/
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $this->authorize('create', Estetica::class);
        return view("estetica.create");
    }
    public function createsocio()
    {
       // $this->authorize('create', Estetica::class);
        //return view("estetica.create");
        
        return view("estetica.createsocio");
    }

    public function createtratamiento()
    {
       // $this->authorize('create', Estetica::class);
        //return view("estetica.create");
        
        return view("tratamiento.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    //    $estetica = Admin::find($id);
       
      //  return view('estetica.show', ['estetica' => $estetica]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $estetica = Admin::find($id);
        return view('estetica.edit', ['estetica' => $estetica]);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Estetica::class);
        $estetica = Admin::find($id);
        $estetica->delete();
        return redirect()->route('esteticas.index')->with("exito", "Eliminado exitosamente");
    }
}
