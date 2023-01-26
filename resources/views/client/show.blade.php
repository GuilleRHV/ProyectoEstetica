@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1>Detalle del cliente</h1>
            
            
               
                    

                    <div class="form-group">

                    <label for="DNI" class="col-form-label" style="font-weight:600;font-size:17px">DNI</label><br>
                    <label for="DNI" class="col-form-label">{{ $client->dni ?? '' }}</label>
                    </div>



                    <div class="form-group">
                    <label for="nombre" class="col-form-label" style="font-weight:600;font-size:17px">Nombre</label><br>
                    <label for="nombre" class="col-form-label">{{ $client->nombre ?? '' }}</label>
                    </div>

                    <div class="form-group">
                    <label for="apellidos" class="col-form-label" style="font-weight:600;font-size:17px">Apellidos</label><br>
                    <label for="apellidos" class="col-form-label">{{ $client->apellidos ?? '' }}</label>
                    </div>

                    <div class="form-group">
                    <label for="telefono" class="col-form-label" style="font-weight:600;font-size:17px">Telefono</label><br>
                    <label for="telefono" class="col-form-label">{{ $client->telefono ?? '' }}</label>
                    </div>

                    <div class="form-group">
                    <label for="email" class="col-form-label" style="font-weight:600;font-size:17px">Email</label><br>
                    <label for="email" class="col-form-label">{{ $client->email ?? '' }}</label>
                    </div>

                    @foreach($client->order as $cl)

                    <div class="form-group">
                    <label for="email" class="col-form-label" style="font-weight:600;font-size:17px">Pedido</label><br>
                    <label for="email" class="col-form-label">{{ $cl ?? '' }}</label>
                    </div>
                    @endforeach

                    

                        
                    
                    <a href="{{route('clients.index')}}" class="btn btn-primary">Index</a>
                    <a href="{{route('clients.edit',$client->id)}}" class="btn btn-warning">Edit</a>
          

              
                
            

        </div>
    </div>
</div>
@endsection