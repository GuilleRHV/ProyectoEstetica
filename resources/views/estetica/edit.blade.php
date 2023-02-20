@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Editar socio</h1>
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


            <form action="{{route('esteticas.update',$estetica->id)}}" method="post">
                @csrf

                @method("PUT")


                

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="{{ $estetica->nombre ?? '' }}">
                    </label>
                </div>

                <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="{{ $estetica->email ?? '' }}">
                    </label>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="password" class="form-control" placeholder="{{ $estetica->password ?? '' }}">
                    </label>
                </div>

                

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="puesto" value="gerente" <?php 
                                                                                                  if($estetica->puesto=="gerente"){
                                                                                                    echo 'checked';
                                                                                                  }      ?>>
                    <label class="form-check-label" for="gerente">Gerente</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="puesto"  value="recepcionista" <?php 
                                                                                                  if($estetica->puesto=="recepcionista"){
                                                                                                    echo 'checked';
                                                                                                  }      ?>>
                    <label class="form-check-label" for="recepcionista">recepcionista</label>
                </div>
               

                <input type="submit" value="Actualizar" class="btn btn-warning">
            </form>





        </div>
    </div>
</div>
@endsection