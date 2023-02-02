@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1>Detalle del producto</h1>
            
            
               
           

            {{session('color') }}

                    <div class="form-group">
                    <label for="nombre" class="col-form-label" style="font-weight:600;font-size:17px">Nombre</label><br>
                    <label for="nombre" class="col-form-label">{{ $product->nombre ?? '' }}</label>
                    </div>

                    <div class="form-group">
                    <label for="descripcion" class="col-form-label" style="font-weight:600;font-size:17px">Descripcion</label><br>
                    <label for="descripcion" class="col-form-label">{{ $product->descripcion ?? '' }}</label>
                    </div>

                    <div class="form-group">
                    <label for="precio" class="col-form-label" style="font-weight:600;font-size:17px">Precio</label><br>
                    <label for="precio" class="col-form-label">{{ $product->precio ?? '' }}</label>
                    </div>

                        
                    
                    <a href="{{route('products.index')}}" class="btn btn-primary">Index</a>
                    <a href="{{route('products.edit',$product->id)}}" class="btn btn-warning">Edit</a>
          

              
                
            

        </div>
    </div>
</div>
@endsection