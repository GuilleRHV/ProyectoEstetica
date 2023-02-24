<?php

namespace App\Http\Controllers;

use App\Models\CentroEstetica;
use App\Models\Peluqueria;
use App\Models\Tratamiento;

use App\Models\Socio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

//Tratamiento: Hay que darlos de alta para poder asignarlos a los socios.
class TratamientoController extends Controller
{

    public function index()
    {
        //
    }


    //Devuelve la vista create.
    public function create()
    {
        return view("tratamiento.create");
    }


    //Almacena un tratamiento en la base de datos
    public function store(Request $request)
    {
        // Tratamiento::create($request->all());

        $tratamiento = new Tratamiento();
        $tratamiento->nombre = $request->input('nombre');
        $tratamiento->precio = $request->input('precio');
        $tratamiento->tipo = $request->input('tipo');




        $peluquerias = Peluqueria::all();
        $centrosesteticas = CentroEstetica::all();

        if ($request->input('centro_nombre') == "peluqueria") {
            $encontrado = false;
            foreach ($peluquerias as $p) {
                if ($p->id == $request->input("centro_id")) {
                    $encontrado = true;
                }
            }
            if (!$encontrado) {
                $tratamiento->peluqueria_id = 1;
            } else {
                $tratamiento->peluqueria_id = $request->input('centro_id');
            }



        } else {
            



            $encontrado = false;
            foreach ($centrosesteticas as $p) {
                if ($p->id == $request->input("centro_id")) {
                    $encontrado = true;
                }
            }
            if (!$encontrado) {
                $tratamiento->centroestetica_id = 1;
            } else {
                $tratamiento->centroestetica_id = $request->input('centro_id');
            }
        }




        $tratamiento->save();
        return redirect()->route('esteticas.index')->with('exito', 'usuario creado correctamente');
    }

    //Funcion para poder asignar un tratamiento con un socio.
    public function dartratamiento($id)
    {
        $socio = Socio::find($id);

        $tratamientos = Tratamiento::all();

        return view('tratamiento.dartratamiento', ['socio' => $socio, 'tratamientos' => $tratamientos]);
    }

    public function show($id)
    {
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
