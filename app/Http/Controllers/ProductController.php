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

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        $this->authorize('viewAny', Product::class);
        $productList = Product::all(); //eloquent ORM
        //return $productList;
        return view('product.index', ['productList' => $productList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Product::class);
        return view('product.create');
      //  $this->authorize('create', Product::class);
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
            'nombre' => 'required|max:100',
            'descripcion' => 'required',
            'precio' => 'required|not_in:0'
        ], [
            'nombre.required' => 'El nombre es obligatiorio',
            'descripcion.required' => 'La descripcion es obligatioria',
            'precio.required' => 'El precio es obligatiorio',
            'nombre.max' => 'El nombre no puede tener mas de 100 caracteres',
            'precio.not_in' => 'El precio no debe ser 0'


        ]);


        //METODO 1
        /*
        $producto = new Product;
        $producto->nombre=$request->input('nombre');
        $producto->descripcion=$request->input('descripcion');
        $producto->precio=$request->input('precio');
        $producto->save();
        */


        //METODO 2 (En el model Product se incluye):
        //protected $fillable = ['nombre', 'descripcion', 'precio'];

        Product::create($request->all());
        $this->authorize('create', Product::class);
        return redirect()->route('products.index')->with('productocreado', 'Producto creado correctamente');
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
        $this->authorize('view', $product);

        
        if (session('cont') == null) {
            
            session(['cont'=>'1']);

        } else {
            $cont = session('cont');
            if($id%2==0){
                session(['color'=>'rojo']);
                $cont++;
            }else{
                session(['color'=>'verde']);
                $cont = 0;
            }
           
            session(['cont'=>$cont]);

           // session(['contador'=>'1']);
        }
        
            //return $product;
            return view('product.show', ['product' => $product]);
        
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
        $this->authorize('update', $product);
        return view('product.edit', ['product' => $product]);
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
            'nombre' => 'required|max:100',
            'descripcion' => 'required',
            'precio' => 'required|not_in:0'
        ], [
            'nombre.required' => 'El nombre es obligatiorio',
            'descripcion.required' => 'La descripcion es obligatioria',
            'precio.required' => 'El precio es obligatiorio',
            'nombre.max' => 'El nombre no puede tener mas de 100 caracteres',
            'precio.not_in' => 'El precio no debe ser 0'


        ]);


        $p = Product::find($id);
        $this->authorize('update', $p);
        //Request input del formulario (name)
        $p->nombre = $request->input('nombre');
        $p->descripcion = $request->input('descripcion');
        $p->precio = $request->input('precio');

        //USAMOS EL ELOQUENT PARA GUARDAR
        $p->save(); //Es un metodo de eloquent
        return redirect()->route('products.index')->with('modificado', 'Producto actualizado correctamente');
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
        //Product::destroy($id);

        $p = Product::find($id);
        $this->authorize('delete', $p);
        $p->delete();


        return redirect()->route('products.index')->with('eliminado', 'Producto correctamente eliminado');
    }
}
