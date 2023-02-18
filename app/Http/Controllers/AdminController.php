<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
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
        //dd("creando admin");
        return view("admin.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin = new Admin();

        $admin->nombre = $request->input("nombre");
        $admin->password = password_hash($request->input("password"),PASSWORD_BCRYPT);
  
        $admin->email = $request->input("email");
        $admin->puesto = $request->input("puesto");
        $admin->save();

       // Admin::create($request->all());
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
        
        $admin = Admin::find($id);
        //$this->authorize('view', $admin);
        return view('admin.show', ['admin' => $admin]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admin.edit', ['admin' => $admin]);
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
        $admin = Admin::find($id);

        $admin->nombre = $request->input("nombre");
        $admin->password = $request->input("password");
  
        $admin->email = $request->input("email");

        $admin->save();
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
       
        $admin = Admin::find($id);
        $admin->delete();
        return redirect()->route('esteticas.index')->with("exito", "Eliminado exitosamente");
    }
}
