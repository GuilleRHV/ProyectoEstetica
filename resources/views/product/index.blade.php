@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Lista productos</h1>
            <a class="btn btn-success" href="{{ route('products.create') }}" class="btn btn">Nuevo producto</a>

            <table class="table table-striped table-hover">
                @foreach($productList as $product)
                <tr>
                    <td>{{$product->nombre}}</td>
                    <td>{{$product->descripcion}}</td>
                    <td>{{$product->precio}}</td>
                    <td>
                        <a class="btn btn-warning" href="{{route('products.edit',$product->id)}}">Editar</a>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{route('products.show',$product->id)}}">Ver</a>
                    </td>
                    <td>

                        <form action="{{route('products.destroy',$product->id)}}" method="post">
                            @csrf 
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                        
                    </td>

                </tr>
                @endforeach
            </table>

        </div>
    </div>
</div>
@endsection
