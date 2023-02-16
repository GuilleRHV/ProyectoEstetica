@extends('layouts.app')

@section('content')


@can ('create', 'App\Models\Admin')
<a class="btn btn-success" href="{{ route('esteticas.create') }}" class="btn btn">Dar de alta</a>
@endcan
<table class="table table-striped table-hover">
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
@endsection