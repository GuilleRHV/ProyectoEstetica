@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($message = Session::get('clientcreado'))
            <div class="alert alert-success">
                <h4>{{$message}}</h4>
            </div>
            @endif



            <h1>Lista clientes</h1>
            @can ('create', 'App\Models\Client')
            <a class="btn btn-success" href="{{ route('clients.create') }}" class="btn btn">Nuevo cliente</a>
            @endcan
            <table class="table table-striped table-hover">
                <tr>
                    <td>DNI</td>
                    <td>nombre</td>
                    <td>apellidos</td>
                    <td>telefono</td>
                    <td>email</td>
                </tr>
                @foreach($clientList as $client)
                <tr>
                    <td>{{$client->dni}}</td>
                    <td>{{$client->nombre}}</td>
                    <td>{{$client->apellidos}}</td>
                    <td>{{$client->telefono}}</td>
                    <td>{{$client->email}}</td>
                    <td>
                        @can ('update', $client)
                        <a class="btn btn-warning" href="{{route('clients.edit',$client->id)}}">Editar</a>
                        @endcan
                    </td>
                    <td>
                    @can ('view', $client)
                        <a class="btn btn-primary" href="{{route('clients.show',$client->id)}}">Ver</a>
                        @endcan
                    </td>
                    <td>
                    @can ('delete', $client)
                        <form action="{{route('clients.destroy',$client->id)}}" method="post">
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