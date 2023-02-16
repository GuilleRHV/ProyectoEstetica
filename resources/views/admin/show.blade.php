@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1>Detalle del socio</h1>





            <div class="form-group">
                <label for="nombre" class="col-form-label" style="font-weight:600;font-size:17px">Nombre</label><br>
                <label for="nombre" class="col-form-label">{{ $client->nombre ?? '' }}</label>
            </div>

            <div class="form-group">
                <label for="email" class="col-form-label" style="font-weight:600;font-size:17px">Email</label><br>
                <label for="email" class="col-form-label">{{ $client->email ?? '' }}</label>
            </div>

            <div class="form-group">
                <label for="password" class="col-form-label" style="font-weight:600;font-size:17px">Password</label><br>
                <label for="password" class="col-form-label">{{ $client->password ?? '' }}</label>
            </div>

            <div class="form-group">
                <label for="puesto" class="col-form-label" style="font-weight:600;font-size:17px">Puesto</label><br>
                <label for="puesto" class="col-form-label">{{ $client->puesto ?? '' }}</label>
            </div>

           



            <a href="{{route('clients.index')}}" class="btn btn-primary">Index</a>
            <a href="{{route('clients.edit',$client->id)}}" class="btn btn-warning">Edit</a>






        </div>
    </div>
</div>
@endsection