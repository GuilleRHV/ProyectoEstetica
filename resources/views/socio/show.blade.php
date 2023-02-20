@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1>Detalle del socio</h1>





            <div class="form-group">
                <label for="nombre" class="col-form-label" style="font-weight:600;font-size:17px">Nombre</label><br>
                <label for="nombre" class="col-form-label">{{ $socio->nombre ?? '' }}</label>
            </div>

            <div class="form-group">
                <label for="apellidos" class="col-form-label" style="font-weight:600;font-size:17px">Apellidos</label><br>
                <label for="apellidos" class="col-form-label">{{ $socio->apellidos ?? '' }}</label>
            </div>

            <div class="form-group">
                <label for="edad" class="col-form-label" style="font-weight:600;font-size:17px">Edad</label><br>
                <label for="edad" class="col-form-label">{{ $socio->edad ?? '' }}</label>
            </div>

            <div class="form-group">
                <label for="telefono" class="col-form-label" style="font-weight:600;font-size:17px">Telefono</label><br>
                <label for="telefono" class="col-form-label">{{ $socio->telefono ?? '' }}</label>
            </div>



            <div class="form-group">
                <label for="tratamientos" class="col-form-label" style="font-weight:600;font-size:17px">Tratamientos</label><br>
              
            </div>
            <table class="table table-success table-striped">
                <thead>
                    <tr>
                  
                        <th scope="col">Nombre tratamiento</th>
                        <th scope="col">fecha</th>
                        <th scope="col">precio</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($socio->tratamientos as $tratamiento)
                   

                    <tr>
                        <td>{{ $tratamiento->nombre }}</td>
                
                        <td>{{ $tratamiento->pivot->fecha }}</td>
                        <td>{{ $tratamiento->precio }}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

            <div class="form-group">
                <label for="tratamientos" class="col-form-label" style="font-weight:600;font-size:17px">Dinero total gastado</label><br>
                <label for="telefono" class="col-form-label">{{ $dinerototalgastado }}</label>
            </div>




            <a href="{{route('esteticas.index')}}" class="btn btn-primary">Index</a>
            <a href="{{route('socio.edit',$socio->id)}}" class="btn btn-warning">Edit</a>






        </div>
    </div>
</div>
@endsection