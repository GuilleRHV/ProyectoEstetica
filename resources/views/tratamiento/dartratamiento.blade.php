@extends('layouts.app')
{{-- Vista para asginar un tratamiento a un socio --}}
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Dar tratamiento</h1>
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



            <form action="{{route('sociotratamiento.store')}}" method="post">
                @csrf


                <div class="form-group">
                    <label for="password">ID</label>
                    <input type="text" name="socio_id" id="socio_id" class="form-control" value="{{ $socio->id ?? '' }}" readonly>
                    </label>
                </div>
                <div class="form-group">
                    <label for="password">Nombre</label>
                    <input type="text" name="nombre" id="password" class="form-control" value="{{ $socio->nombre ?? '' }}" readonly>
                    </label>
                </div>
                <div class="form-group">
                    <label for="password">Apellidos</label>
                    <input type="text" name="apellidos" id="password" class="form-control" value="{{ $socio->apellidos ?? '' }}" readonly>
                    </label>
                </div>






                @foreach($tratamientos as $t)
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tratamiento_id" value="{{ $t->id ?? '' }}">
                    <label class="form-check-label" for="trat">{{ $t->nombre ?? '' }}</label>
                </div><br>

                @endforeach
                @if(count($tratamientos) == 0)
                <div class="alert alert-danger">
                    <h4>No hay tratamientos a elegir, da de alta algún tratamiento</h4>
                    <h3> <a class="btn btn-success" href="{{route('tratamiento.create')}}" class="btn btn">Dar de alta tratamiento</a></h3>
                </div>
                @endif

                <input type="date" id="start" name="fecha" value="2018-07-22" min="2018-01-01" max="2023-12-31"><br><br>




                <input type="submit" value="Crear" class="btn btn-success">
            </form>





        </div>
    </div>
</div>
@endsection
