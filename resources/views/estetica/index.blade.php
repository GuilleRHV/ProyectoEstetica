@extends('layouts.app')

@section('content')


@can ('create', 'App\Models\Estetica')
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
        <td>@can ('view', $admin)
            <a class="btn btn-primary" href="{{route('admins.show',$admin->id)}}">Ver</a>
            @endcan
        </td>

    </tr>
    @endforeach
</table>
@endsection