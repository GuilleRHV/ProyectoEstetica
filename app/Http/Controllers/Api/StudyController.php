<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Study;
use Illuminate\Support\Facades\Validator;


class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Se deberia devolver un objeto con una propiedad 
    public function index()
    {
        $studies = Study::all();


        return response()->json(['status' => 'ok', 'data' => $studies], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Validator::make(
            $request->all(),
            [

                'name' => 'required|max:100',
                'code' => 'required',
                'family' => 'required|max:100',
                'level' => 'required',
               
            ],
            [
                "precio.required" => "El precio es obligatorio",
                "precio.not_in" => "El precio no puede ser 0",
                // "precio.min"=>"El precio tieen 0",
            ]
        );


        //Si falla validacion -> 422
        if ($validated->fails()) {
            return response()->json(
                [
                    'status' => 'NOK',
                    "data" => $validated->errors()
                ],
                422
            );
        }

        $newproduct = Study::create($request->all());

        return response()->json([
            'status' => "OK",
            "data" => $newproduct
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Study::find($id);

        if (!$product) {
            return response()->json(['error' => (['code' => 404, 'message' => 'No se encuentra el producto'])], 404);
        }

        return response()->json(['status' => 'ok', 'data' => $product], 200);
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
        $product = Study::find($id);
        if (!$product) {
            return response()->json(
                [

                    'status' => "NOK",
                    'message' => 'No se encuentra el producto'
                ],
                404
            );
        }


        $validated = Validator::make(
            $request->all(),
            [
                'name' => 'required|max:100',
                'code' => 'required',
                'family' => 'required|max:100',
                'level' => 'required',
            ],
            [
                "precio.required" => "El precio es obligatorio",
                "precio.not_in" => "El precio no puede ser 0",
                // "precio.min"=>"El precio tieen 0",
            ]
        );


        //Si falla validacion -> 422
        if ($validated->fails()) {
            return response()->json(
                [
                    'status' => 'NOK',
                    "data" => $validated->errors()
                ],422
            );
        }

        $product->fill($request->all()); //Relleno con los datos el objeto
        $product->save(); //guartdo en bbdd
        return response()->json(['status' => 'ok', 'data' => $product], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Study::find($id);

        if (!$product) {
            return response()->json([
                'status' => 'ok',
                 'message' => "No se encuentra un producto con este codigo"],
                  404);
        }


        try{
            $product->delete();
            return response()->json(["Borrado correctamente"],204);
        }catch(\Throwable $th){
            return response()->json([
                "status" => "NOK",
                "mensaje" => "Borrado no realizado",
                "error" =>$th->getMessage()
            ],409);
        }



    }
}
