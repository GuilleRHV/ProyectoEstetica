@extends('layouts.app')
{{-- Formulario para editar un Socio --}}
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Modificar socio</h1>
            <a href="{{route('esteticas.index')}}" class="btn btn-primary">Index</a>

            <hr>
            @if($errors->any())
            <div class="alert alert-danger">
                <h4>Por favor, corrige los siguientes errores:</h4>
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}<br></li>
                    @endforeach
                </ul>
            </div>
            @endif



            <form action="{{route('socio.update',$socio->id)}}" method="post">
                @csrf
                @method("PUT")


                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="{{ $socio->nombre ?? '' }}">
                    </label>
                </div>

                <div class="form-group">
                    <label for="apellidos">apellidos</label>
                    <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="{{ $socio->apellidos ?? '' }}">
                    </label>
                </div>

                <div class="form-group">
                    <label for="edad">edad</label>
                    <input type="text" name="edad" id="edad" class="form-control" placeholder="{{ $socio->edad ?? '' }}">
                    </label>
                </div>

                <div class="form-group">
                    <label for="telefono">telefono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" placeholder="{{ $socio->telefono ?? '' }}">
                    </label>
                </div>


                
                <input type="submit" value="Modificar" class="btn btn-success">
            </form>





        </div>
    </div>
</div>
@endsection
