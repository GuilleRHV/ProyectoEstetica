@extends('layouts.app')

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



            <form action="{{route('tratamiento.store')}}" method="post">
                @csrf




              

                <div class="form-group">
                    <label for="nombre" class="col-form-label" style="font-weight:600;font-size:17px">Nombre</label><br>
                    <label for="nombre" class="col-form-label">{{ $tratamiento->nombre ?? '' }}</label>
                    </div>

                    <div class="form-group">
                    <label for="apellidos" class="col-form-label" style="font-weight:600;font-size:17px">Apellidos</label><br>
                    <label for="apellidos" class="col-form-label">{{ $tratamiento->apellidos ?? '' }}</label>
                    </div>

                <div class="form-group">
                    <label for="password">password</label>
                    <input type="text" name="password" id="password" class="form-control" placeholder="password">
                    </label>
                </div>


                @foreach($tratamientos as $t)
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="{{ $t->nombre ?? '' }}" value="{{ $t->nombre ?? '' }}">
                   
                </div><br>
                @endforeach



                <input type="submit" value="Crear" class="btn btn-success">
            </form>





        </div>
    </div>
</div>
@endsection