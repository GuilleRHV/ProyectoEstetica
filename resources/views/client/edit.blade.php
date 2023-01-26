@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Detalle del producto</h1>
            <a href="{{route('clients.index')}}" class="btn btn-primary">Index</a>

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


            <form action="{{route('clients.update',$client->id)}}" method="post">
                @csrf

                @method("PUT")


                <div class="form-group">
                    <label for="dni">dni</label>
                    <input type="text" name="dni" id="dni" class="form-control" placeholder="{{ $client->dni ?? '' }}">
                    </label>
                </div>

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="{{ $client->nombre ?? '' }}">
                    </label>
                </div>

                <div class="form-group">
                    <label for="apellidos">Descripcion</label>
                    <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="{{ $client->apellidos ?? '' }}">
                    </label>
                </div>

                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" placeholder="{{ $client->telefono ?? '' }}">
                    </label>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="{{ $client->email ?? '' }}">
                    </label>
                </div>



                <input type="submit" value="Actualizar" class="btn btn-warning">
            </form>





        </div>
    </div>
</div>
@endsection