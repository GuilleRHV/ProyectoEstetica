@extends('layouts.app')
{{-- muestra los detalles de un Admnistrador --}}

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1>Detalle del administrador</h1>

            <hr>



            <div class="form-group">
                <label for="nombre" class="col-form-label" style="font-weight:600;font-size:17px">Nombre</label><br>
                <label for="nombre" class="col-form-label">{{ $admin->nombre ?? '' }}</label>
            </div>
            <hr>
            <div class="form-group">
                <label for="email" class="col-form-label" style="font-weight:600;font-size:17px">Email</label><br>
                <label for="email" class="col-form-label">{{ $admin->email ?? '' }}</label>
            </div>
            <hr>
            <div class="form-group">
                <label for="password" class="col-form-label" style="font-weight:600;font-size:17px">Password</label><br>
                <label for="password" class="col-form-label">{{ $admin->password ?? '' }}</label>
            </div>
            <hr>
            <div class="form-group">
                <label for="puesto" class="col-form-label" style="font-weight:600;font-size:17px">Puesto</label><br>
                <label for="puesto" class="col-form-label">{{ $admin->puesto ?? '' }}</label>
            </div>





            <a href="{{route('esteticas.index')}}" class="btn btn-primary">Inicio</a>
            @can ('updateAdmin', $admin)
            <a href="{{route('admin.edit',$admin->id)}}" class="btn btn-warning">Editar</a>
            @endcan





        </div>
    </div>
</div>
@endsection