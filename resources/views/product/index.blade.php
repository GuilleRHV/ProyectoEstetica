@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($message = Session::get('productocreado'))
            <div class="alert alert-success">
                <h4>{{$message}}</h4>
            </div>
            @endif



            <h1>Lista productos</h1>

            @can ('create', 'App\Models\Product')
            <a class="btn btn-success" href="{{ route('products.create') }}" class="btn btn">Nuevo producto</a>
            @endcan
            <table class="table table-striped table-hover">
                @foreach($productList as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->nombre}}</td>
                    <td>{{$product->descripcion}}</td>
                    <td>{{$product->precio}}</td>
                    <td>
                        @can ('update', $product)
                        <a class="btn btn-warning" href="{{route('products.edit',$product->id)}}">Editar</a>
                        @endcan
                    </td>
                    <td>
                        @can ('view', $product)
                        <a class="btn btn-primary" href="{{route('products.show',$product->id)}}">Ver</a>
                        @else
                        @endcan
                    </td>
                    <td>
                        @can ('delete', $product)
                        <form action="{{route('products.destroy',$product->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Borrar" class="btn btn-danger">
                        </form>
                        @endcan

                    </td>

                </tr>
                @endforeach
            </table>

        </div>
    </div>
</div>
@endsection