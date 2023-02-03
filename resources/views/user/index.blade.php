@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($message = Session::get('usercreado'))
            <div class="alert alert-success">
                <h4>{{$message}}</h4>
            </div>
            @endif



            <h1>Lista usuarios</h1>
            @can ('create', 'App\Models\User')
            <a class="btn btn-success" href="{{ route('users.create') }}" class="btn btn">Nuevo cliente</a>
            @endcan
            <table class="table table-striped table-hover">
                <tr>
                    <td>id</td>
                    <td>nombre</td>

                    <td>email</td>
                    <td>password</td>
                </tr>
                @foreach($userList as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>

                    <td>{{$user->email}}</td>
                    <td>{{$user->password}}</td>
                    <td>
                        @can ('update', $user)
                        <a class="btn btn-warning" href="{{route('users.edit',$user->id)}}">Editar</a>
                        @endcan
                    </td>
                    <td>
                        @can ('view', $user)
                        <a class="btn btn-primary" href="{{route('users.show',$user->id)}}">Ver</a>
                        @endcan
                    </td>
                    <td>
                    @can ('create', $user)
                        <form action="{{route('users.destroy',$user->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    @endcan
                    </td>

                </tr>
                @endforeach
            </table>

        </div>
    </div>
</div>
@endsection