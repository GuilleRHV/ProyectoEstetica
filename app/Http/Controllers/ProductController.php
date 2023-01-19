<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productList= Product::all(); //eloquent ORM
        //return $productList;
        return view('product.index', ['productList'=>$productList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$producto= new Product([
            'nombre'=>$request->input('nombre'),
            'descripcion'=>$request->input('descripcion'),
            'precio'=>$request->input('precio')
        ]);*/
        $producto = new Product;
        $producto->nombre=$request->input('nombre');
        $producto->descripcion=$request->input('descripcion');
        $producto->precio=$request->input('precio');
        $producto->save();
        return redirect()->route('products.index')->with('producto', 'Producto creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Buscar producto
        //Buscar vista
        $product = Product::find($id);
        //return $product;
        return view('product.show', ['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // dd("editar");
        $product = Product::find($id);
        return view('product.edit',['product'=>$product]);
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
        $p = Product::find($id);
        //Request input del formulario (name)
        $p->nombre = $request->input('nombre');
        $p->descripcion = $request->input('descripcion');
        $p->precio=$request->input('precio');

        //USAMOS EL ELOQUENT PARA GUARDAR
        $p->save(); //Es un metodo de eloquent
        return redirect()->route('products.index')->with('exito','Producto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //Metodo 1
        /*$product = Product::find($id);
        $product->delete();
        */ 
        Product::destroy($id);
        return redirect()->route('products.index')->with('exito','Producto correctamente eliminado');
    }
}
