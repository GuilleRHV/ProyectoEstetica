@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1>Detalle del usuario</h1>
            
            
               
                    

                    <div class="form-group">
                    <label for="nombre" class="col-form-label" style="font-weight:600;font-size:17px">Nombre</label><br>
                    <label for="nombre" class="col-form-label">{{ $user->name ?? '' }}</label>
                    </div>

                    <div class="form-group">
                    <label for="descripcion" class="col-form-label" style="font-weight:600;font-size:17px">email</label><br>
                    <label for="email" class="col-form-label">{{ $user->email ?? '' }}</label>
                    </div>

                    <div class="form-group">
                    <label for="descripcion" class="col-form-label" style="font-weight:600;font-size:17px">password</label><br>
                    <label for="password" class="col-form-label">{{ $user->password ?? '' }}</label>
                    </div>
                   
                        
                    
                    <a href="{{route('users.index')}}" class="btn btn-primary">Index</a>
                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-warning">Edit</a>
          

              
                
            

        </div>
    </div>
</div>
@endsection