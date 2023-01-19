@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Crear producto</h1>
            <a href="{{route('products.index')}}" class="btn btn-primary">Index</a>

            <hr>
            <form action="{{route('products.store')}}" method="post">
                @csrf

            
               
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre"  class="form-control" placeholder="Nombre">
                    </label>
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                        <input type="text" name="descripcion" id="descripcion"  class="form-control" placeholder="Descripcion">
                    </label>
                </div>

                <div class="form-group">
                    <label for="precio">Precio</label>
                        <input type="text" name="precio" id="precio"  class="form-control" placeholder="Precio">
                    </label>
                </div>



                <input type="submit" value="Crear" class="btn btn-success">
            </form>





        </div>
    </div>
</div>
@endsection