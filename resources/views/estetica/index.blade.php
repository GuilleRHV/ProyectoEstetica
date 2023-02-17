@extends('layouts.app')

@section('content')




@can ('create', 'App\Models\Admin')
<a class="btn btn-success" href="{{ route('admin.create') }}" class="btn btn">Dar de alta admins</a>
<a class="btn btn-success" href="{{ route('socio.create') }}" class="btn btn">Dar de alta clientes</a>
<a class="btn btn-success" href="{{route('tratamiento.create')}}" class="btn btn">Dar de alta tratamiento</a>
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
            <a class="btn btn-warning" href="{{route('admin.edit',$admin->id)}}">Editar</a>
            @endcan
        </td>
        <td>@can ('view', $admin)
            <a class="btn btn-primary" href="{{route('admin.show',$admin->id)}}">Ver</a>
            @endcan
        </td>

        <td>
            @can ('delete', $admin)
            <form action="{{route('socio.destroy',$admin->id)}}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete" class="btn btn-danger">
            </form>
            @endcan
        </td>

    </tr>
    @endforeach
</table>



<table class="table table-striped table-hover">
    <h1>Socios</h1>
    <tr>
 
        <td>nombre</td>
        <td>apellidos</td>
        <td>edad</td>
        <td>telefono</td>

    </tr>
    @foreach($socioList as $socio)
    <tr>

        <td>{{$socio->nombre}}</td>
        <td>{{$socio->apellidos}}</td>
        <td>{{$socio->edad}}</td>
        <td>{{$socio->telefono}}</td>

        

        <td>
           
            <a class="btn btn-success" href="{{route('tratamiento.dartratamiento',$socio->id)}}">Añadir tratamiento</a>
        
        </td>
        <td>
            @can ('update', $admin)
            <a class="btn btn-warning" href="{{route('socio.edit',$socio->id)}}">Editar</a>
            @endcan
        </td>
        <td>@can ('view', $admin)
            <a class="btn btn-primary" href="{{route('socio.show',$socio->id)}}">Ver</a>
            @endcan
        </td>

        <td>
            @can ('delete', $admin)
            <form action="{{route('socio.destroy',$socio->id)}}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete" class="btn btn-danger">
            </form>
            @endcan
        </td>

    </tr>
    @endforeach
</table>






@endsection