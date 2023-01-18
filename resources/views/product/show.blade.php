@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1>Detalle del producto</h1>
            <a href="{{route('products.index')}}" class="btn btn-primary">Index</a>
            <a href="{{route('products.edit',$product->id)}}" class="btn btn-warning">Edit</a>
                <tr>
                    <td><strong>Nombre</strong>: {{$product->nombre}}</td>
                    <td><strong>Descripcion</strong>: {{$product->descripcion}}</td>
                    <td><strong>Precio</strong>: {{$product->precio}}</td>
                    
          

                </tr>
                
            

        </div>
    </div>
</div>
@endsection