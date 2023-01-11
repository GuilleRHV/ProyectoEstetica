@extends('layouts.master');

@section('title','Alta asignaturas')

@section('encabezado')
Añadir pelicula
@stop


@section('cuerpo')
@parent
<h3>Pelicula</h3>
<form action="{{ route('videoclub.create') }}" method="get">
    
@stop
    
@section('boton')
    @parent
    @section('destino')
    {{route('videoclub.create')}}
    @stop

    @section('accionformulario')
    Enviar
    @stop
    </form>
@stop







    






