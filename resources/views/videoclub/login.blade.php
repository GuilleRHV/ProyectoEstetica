@extends('layouts.master');

@section('title','Alta asignaturas')

@section('encabezado')
Login
@stop


@section('cuerpo')
@parent
<h3>Introduce usuario</h3>
<form action="{{ route('asignaturas.store') }}" method="post">
    @csrf
    <label for="nombre">Nombre</label><br>
    <input type="text" name="nombre" id="nombre" value="{{old('nombre')}}">
    <br>
    <label for="curso">Curso</label><br>
    <input type="text" name="curso" id="curso" value="{{old('curso')}}">
    <br>
    <label for="ciclo">Ciclo</label><br>
    <input type="text" name="ciclo" id="ciclo" value="{{old('ciclo')}}"><br>
    <label for="coment">Comentarios</label><br>
    <textarea name="comentario" id="comentarios" cols="24" rows="10" placeholder="Escribe aqui"></textarea>
    <br>

@stop



