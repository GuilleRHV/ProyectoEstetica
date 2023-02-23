@extends('layouts.app')

{{-- Formulario para editar un admin --}}
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Editar administrador</h1>
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



            <form action="{{route('admin.update',$admin->id)}}" method="post">
                @csrf

                @method("PUT")


                <div class="form-group">
                    <label for="nombre">Nombreee</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="{{ $admin->nombre ?? '' }}">
                    </label>
                </div>

                <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="{{ $admin->email ?? '' }}">
                    </label>
                </div>

                <div class="form-group">
                    <label for="password">password</label>
                    <input type="text" name="password" id="password" class="form-control" placeholder="{{ $admin->password ?? '' }}">
                    </label>
                </div>


                <div class="form-check">
                    <input class="form-check-input" type="radio" name="puesto" value="gerente"  <?php 
                                                                                                  if($admin->puesto=="gerente"){
                                                                                                    echo 'checked';
                                                                                                  }      ?>>
                    <label class="form-check-label" for="gerente">Gerente</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="puesto"  value="recepcionista" <?php 
                                                                                                  if($admin->puesto=="recepcionista"){
                                                                                                    echo 'checked';
                                                                                                  }      ?>>
                    <label class="form-check-label" for="recepcionista">recepcionista</label>
                </div>
               



                <input type="submit" value="Crear" class="btn btn-success">
            </form>





        </div>
    </div>
</div>
@endsection
