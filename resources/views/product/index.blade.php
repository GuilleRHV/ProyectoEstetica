@extends('layouts.master');

@section('title','Listado productos')

@section('encabezado')
Listado productos
@stop




@section('cuerpo')
@parent

<h3>Lista productos</h3>
    <a href="{{ route('products.create') }}" class="btn btn">Nuevo producto</a>

    <table border="1">
        @foreach($productList as $product)
        <tr>
            <td>{{$product->nombre}}</td>
            <td>{{$product->descripcion}}</td>
            <td>{{$product->precio}}</td>
            <td>
                <a href="{{route('products.edit',$product->id)}}">Editar</a>
            </td>
            <td>
                <a href="{{route('products.show',$product->id)}}">Ver</a>
            </td>
          
        </tr>
        @endforeach
    </table>


  

    
    