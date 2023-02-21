@extends('layouts.app')
{{--Vista que muestra todos los admins --}}
@section('content')


@can ('create', 'App\Models\Estetica')
<a class="btn btn-success" href="{{ route('admins.create') }}" class="btn btn">Dar de alta a socio</a>
@endcan
<table class="table table-striped table-hover">
    <tr>
        <td>nombreee</td>
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


    </tr>
    @endforeach
</table>
@endsection
