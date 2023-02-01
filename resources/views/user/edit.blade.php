@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Detalle del producto</h1>
            <a href="{{route('users.index')}}" class="btn btn-primary">Index</a>

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


            <form action="{{route('users.update',$user->id)}}" method="post">
                @csrf

                @method("PUT")

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="{{ $user->name ?? '' }}">
                    </label>
                </div>

                <div class="form-group">
                    <label for="descripcion">Email</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="{{ $user->email ?? '' }}">
                    </label>
                </div>

                <div class="form-group">
                    <label for="descripcion">password</label>
                    <input type="text" name="password" id="password" class="form-control" placeholder="{{ $user->password ?? '' }}">
                    </label>
                </div>
        


                <input type="submit" value="Actualizar" class="btn btn-warning">
            </form>





        </div>
    </div>
</div>
@endsection