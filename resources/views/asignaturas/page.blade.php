@extends('layouts.master')

@section('title','Pagina de Informacion')


@section('widget')
    @parent
    <h4>Esto es un añadido</h4>
@stop


@section('maincontent')
   
    <h5>Añadido al main content</h5>
@stop


@section('secondarycontent')
  
    <h5>Añadido al contenido secundario</h5>
    {{$ciclo}}
@stop