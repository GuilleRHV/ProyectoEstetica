<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Socio;
use App\Models\SocioTratamiento;

class SocioController extends Controller
{
   
    public function index()
    {
        //
    }

    
    //Devuelve la vista create.
    public function create()
    {
        return view("socio.create");
    }

    
    //Crea un nuevo Socio a partir de los datos de la peticion enviada por el formulario.
    public function store(Request $request)
    {

        Socio::create($request->all());
        return redirect()->route('esteticas.index')->with('socioexito', 'Socio dado de alta correctamente');
        
    }

   
    //Recupera un Socio a partir de un id dado y lo muestra con una vista
    public function show($id)
    {
        $socio = Socio::find($id);
        $dinerototalgastado=0;

        foreach ($socio->tratamientos as $tr) {

            $dinerototalgastado=$dinerototalgastado+$tr->precio;

        }
      // $sociotratamiento = SocioTratamiento::all();
   
        return view('socio.show', ['socio' => $socio,"dinerototalgastado" => $dinerototalgastado]);
    }

   
     //Recupera un Socio y devuelve la vista para editarlo.
    public function edit($id)
    {
        $socio = Socio::find($id);
        return view('socio.edit', ['socio' => $socio]);
    }

    
     //Actualiza un Socio con los campos de la peticion
    public function update(Request $request, $id)
    {
        //Valida los datos input
        $request->validate([

            "nombre" => "required",
            "apellidos" => "required",
            "edad" => "required",
            "telefono" => "required",
           
        ], [
     
            "nombre.required" => "El nombre es obvligatorio",
            "telefono.required" => "El telefono es obvligatorio",
            "edad.required" => "El edad es obvligatorio",
            "apellidos.required" => "El apellidos es obvligatorio"

        ]);

        $socio = Socio::find($id);
        
        $socio->nombre = $request->input("nombre");
        $socio->apellidos = $request->input("apellidos");
        $socio->edad = $request->input("edad");
        $socio->telefono = $request->input("telefono");

        $socio->save();
        return redirect()->route('esteticas.index')->with("exito", "Modificado exitosamente");

    }

   
    //Busca por id un Socio y lo borra de la tabla
    public function destroy($id)
    {
    
        $socio = Socio::find($id);
        $socio->delete();

        return redirect()->route('esteticas.index')->with("borrarsocioexito", "Socio dado de baja exitosamente");
    }
}
