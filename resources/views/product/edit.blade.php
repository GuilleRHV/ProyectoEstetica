@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Detalle del producto</h1>
            <a href="{{route('products.index')}}" class="btn btn-primary">Index</a>

            <hr>
            <form action="{{route('products.update',$product->id)}}" method="post">
                @csrf

                @method("PUT")
               
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre"  class="form-control" placeholder="{{ $product->nombre ?? '' }}">
                    </label>
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                        <input type="text" name="descripcion" id="descripcion"  class="form-control" placeholder="{{ $product->descripcion ?? '' }}">
                    </label>
                </div>

                <div class="form-group">
                    <label for="precio">Precio</label>
                        <input type="text" name="precio" id="precio"  class="form-control" placeholder="{{ $product->precio ?? '' }}">
                    </label>
                </div>



                <input type="submit" value="Actualizar" class="btn btn-warning">
            </form>





        </div>
    </div>
</div>
@endsection