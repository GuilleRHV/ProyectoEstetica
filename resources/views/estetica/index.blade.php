@extends('layouts.app')

@section('content')


@can ('viewAny', 'App\Models\Admin')


@can ('create', 'App\Models\Admin')
<a class="btn btn-success" href="{{ route('esteticas.create') }}" class="btn btn">Dar de alta admins</a>
<a class="btn btn-success" href="{{ route('esteticas.createsocio') }}" class="btn btn">Dar de alta clientes</a>
@endcan
<table class="table table-striped table-hover">
    <h1>Index estetica</h1>
    <tr>
        <td>nombre</td>
        <td>email</td>
        <td>password</td>
        <td>puesto</td>

    </tr>
    @foreach($adminList as $admin)
    <tr>

        <td>{{$admin->nombre}}</td>
        <td>{{$admin->email}}</td>
        <td>{{$admin->password}}</td>
        <td>{{$admin->puesto}}</td>

        <td>
            @can ('update', $admin)
            <a class="btn btn-warning" href="{{route('esteticas.edit',$admin->id)}}">Editar</a>
            @endcan
        </td>
        <td>@can ('view', $admin)
            <a class="btn btn-primary" href="{{route('esteticas.show',$admin->id)}}">Ver</a>
            @endcan
        </td>

        <td>
            @can ('delete', $admin)
            <form action="{{route('esteticas.destroy',$admin->id)}}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete" class="btn btn-danger">
            </form>
            @endcan
        </td>

    </tr>
    @endforeach
</table>



@endcan



@can ('viewSocio', 'App\Models\Admin')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Pedir tratamiento</h1>
   

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



            <form action="{{route('esteticas.storesocio')}}" method="post">
                @csrf




                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
                    </label>
                </div>


                <div class="form-group">
                    <label for="precio">precio</label>
                    <input type="text" name="precio" id="precio" class="form-control" placeholder="precio">
                    </label>
                </div>

                <div class="form-group">
                    <label for="tipo">tipo de tratamiento</label>


                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="puesto" value="pedicura">
                    <label class="form-check-label" for="pedicura">pedicura</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="puesto" value="cortepelo">
                    <label class="form-check-label" for="cortepelo">corte de pelo</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="puesto" value="masaje">
                    <label class="form-check-label" for="masaje">masaje</label>
                </div>

                <div class="form-group">
                    <label for="fecha">Fecha</label>
                   

                    <br><input type="date" id="start" name="trip-start" value="2018-07-22" min="2018-01-01" max="2018-12-31">


                </div>



                <br><input type="submit" value="Confirmar" class="btn btn-success">
            </form>





        </div>
    </div>
</div>

@endcan


@endsection