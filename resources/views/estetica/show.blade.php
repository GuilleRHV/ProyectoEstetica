@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1>Detalle del esteticae</h1>





       

            <div class="form-group">
                <label for="nombre" class="col-form-label" style="font-weight:600;font-size:17px">Nombre</label><br>
                <label for="nombre" class="col-form-label">{{ $estetica->nombre ?? '' }}</label>
            </div>

            <div class="form-group">
                <label for="email" class="col-form-label" style="font-weight:600;font-size:17px">email</label><br>
                <label for="email" class="col-form-label">{{ $estetica->email ?? '' }}</label>
            </div>

            <div class="form-group">
                <label for="password" class="col-form-label" style="font-weight:600;font-size:17px">password</label><br>
                <label for="password" class="col-form-label">{{ $estetica->password ?? '' }}</label>
            </div>

            <div class="form-group">
                <label for="puesto" class="col-form-label" style="font-weight:600;font-size:17px">puesto</label><br>
                <label for="puesto" class="col-form-label">{{ $estetica->puesto ?? '' }}</label>
            </div>





            <a href="{{route('esteticas.index')}}" class="btn btn-primary">Index</a>
            <a href="{{route('esteticas.edit',$estetica->id)}}" class="btn btn-warning">Edit</a>






        </div>
    </div>
</div>
@endsection