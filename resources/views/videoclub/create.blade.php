@extends('layouts.master');

@section('title','Alta asignaturas')

@section('encabezado')
Añadir pelicula
@stop


@section('cuerpo')
@parent
<h3>Pelicula</h3>
<form action="{{ route('videoclub.store') }}" method="post">
    @csrf
    <label for="titulo">Titulo</label><br>
    <input type="text" name="titulo" id="titulo" value="{{old('titulo')}}">
    <br>
    <label for="director">Director</label><br>
    <input type="text" name="director" id="director" value="{{old('director')}}">
    <br>
    <label for="coment">Comentarios</label><br>
    <textarea name="comentario" id="comentarios" cols="24" rows="10" placeholder="Escribe aqui"></textarea>
    <br>
@stop
    
@section('boton')
    @parent
    @section('destino')
    {{route('videoclub.store')}}
    @stop

    @section('accionformulario')
    Enviar
    @stop
    </form>
@stop
