@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Crear producto</h1>
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



            <form action="{{route('clients.store')}}" method="post">
                @csrf



                <div class="form-group">
                    <label for="DNI">DNI</label>
                    <input type="text" name="DNI" id="DNI" class="form-control" placeholder="DNI">
                    </label>
                </div>


                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
                    </label>
                </div>

                <div class="form-group">
                    <label for="apellidos">apellidos</label>
                    <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Descripcion">
                    </label>
                </div>

                <div class="form-group">
                    <label for="precio">telefono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" placeholder="telefono">
                    </label>
                </div>

                <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="email">
                    </label>
                </div>



                <input type="submit" value="Crear" class="btn btn-success">
            </form>





        </div>
    </div>
</div>
@endsection