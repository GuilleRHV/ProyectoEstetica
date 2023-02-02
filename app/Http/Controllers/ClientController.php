<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $this->authorize('viewAny', Client::class);
        $clientList = Client::all();
        return view('client.index', ['clientList' => $clientList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("client.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            "DNI" => "required",
            "nombre" => "required",
            "apellidos" => "required",
            "telefono" => "required",
            "email" => "required"
        ], [
            "DNI.required" => "El dni es obvligatorio",
            "nombre.required" => "El nombre es obvligatorio",
            "apellidos.required" => "El apellidos es obvligatorio",
            "telefono.required" => "El telefono es obvligatorio",
            "email.required" => "El email es obvligatorio"

        ]);
        Client::create($request->all());
        //return redirect("clients.index")->with("exito","cliente creado correctamente");
        return redirect()->route('clients.index')->with('exito', 'cliente creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);
        return view('client.show', ['client' => $client]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        return view('client.edit', ['client' => $client]);
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

            "DNI" => "required",
            "nombre" => "required",
            "apellidos" => "required",
            "telefono" => "required",
            "email" => "required"
        ], [
            "DNI.required" => "El dni es obvligatorio",
            "nombre.required" => "El nombre es obvligatorio",
            "apellidos.required" => "El apellidos es obvligatorio",
            "telefono.required" => "El telefono es obvligatorio",
            "email.required" => "El email es obvligatorio"

        ]);

        $client = Client::find($id);
        $client->DNI = $request->input("DNI");
        $client->nombre = $request->input("nombre");
        $client->apellidos = $request->input("apellidos");
        $client->telefono = $request->input("telefono");
        $client->email = $request->input("email");

        $client->save();
        return redirect()->route('clients.index')->with("exito", "Modificado exitosamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $client = Client::find($id);
        $client->delete();
        return redirect()->route('clients.index')->with("exito", "Eliminado exitosamente");
    }
}
