@extends('layouts.app')

{{-- Muestra los detalles de un socio --}}

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1>Detalle del socio</h1>


            @if($message = Session::get('tratamientoeliminado'))
            <div class="alert alert-success">
                <h4>{{$message}}</h4>
            </div>
            @endif

            <hr>

            <div class="form-group">
                <label for="nombre" class="col-form-label" style="font-weight:600;font-size:17px">Nombre</label><br>
                <label for="nombre" class="col-form-label">{{ $socio->nombre ?? '' }}</label>
            </div>
            <hr>
            <div class="form-group">
                <label for="apellidos" class="col-form-label" style="font-weight:600;font-size:17px">Apellidos</label><br>
                <label for="apellidos" class="col-form-label">{{ $socio->apellidos ?? '' }}</label>
            </div>
            <hr>
            <div class="form-group">
                <label for="edad" class="col-form-label" style="font-weight:600;font-size:17px">Edad</label><br>
                <label for="edad" class="col-form-label">{{ $socio->edad ?? '' }}</label>
            </div>
            <hr>
            <div class="form-group">
                <label for="telefono" class="col-form-label" style="font-weight:600;font-size:17px">Telefono</label><br>
                <label for="telefono" class="col-form-label">{{ $socio->telefono ?? '' }}</label>
            </div>
            

            <hr>

            <div class="form-group">
                <label for="tratamientos" class="col-form-label" style="font-weight:600;font-size:17px">Tratamientos</label><br>

            </div>
            <table class="table table-success table-striped">
                <thead>
                    <tr>

                        <th scope="col">Nombre tratamiento</th>
                        <th scope="col">fecha</th>
                        <th scope="col">tipo</th>
                        <th scope="col">centro estetica(ID)</th>
                        <th scope="col">peluqueria(ID)</th>
                        <th scope="col">precio</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($socio->tratamientos as $tratamiento)


                    <tr>

                        <td>{{ $tratamiento->nombre }}</td>

                        <td>{{ $tratamiento->pivot->fecha }}</td>
                        <td>{{ $tratamiento->tipo }}</td>
                        <td>{{ $tratamiento->centroestetica_id }}</td>
                        <td>{{ $tratamiento->peluqueria_id }}</td>
                        <td>{{ $tratamiento->precio }}€</td>
                        <td>
                            <form action="{{route('sociotratamiento.destroy',['fecha'=>$tratamiento->pivot->fecha,'socio_id'=>$tratamiento->pivot->socio_id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Eliminar" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

            <div class="form-group">
                <label for="tratamientos" class="col-form-label" style="font-weight:600;font-size:17px">Dinero total gastado</label><br>
                <label for="telefono" class="col-form-label">{{ $dinerototalgastado }} €</label>
            </div>




            <a href="{{route('esteticas.index')}}" class="btn btn-primary">Inicio</a>
            <a href="{{route('socio.edit',$socio->id)}}" class="btn btn-warning">Editar</a>






        </div>
    </div>
</div>
@endsection