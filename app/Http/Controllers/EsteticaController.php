<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Estetica;

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
        return view('estetica.index',["adminList" => $adminList]);

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
        $this->authorize('create', Estetica::class);
        return view("esteticas.create");
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estetica = Estetica::find($id);
        return view('estetica.show', ['estetica' => $estetica]);
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
