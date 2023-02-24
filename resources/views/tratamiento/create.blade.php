@extends('layouts.app')
{{-- Vista para crear un tratamiento --}}
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Dar de alta un tratamiento</h1>
            <a href="{{route('esteticas.index')}}" class="btn btn-primary">Index</a>

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



            <form action="{{route('tratamiento.store')}}" method="post">
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
                    <label for="tipo">tipo</label>

                    </label>
                </div>


                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tipo" value="micropigmentacion" checked>
                    <label class="form-check-label" for="micropigmentacion"> Micropigmentacion</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tipo" value="cuidado de cabello">
                    <label class="form-check-label" for="cuidadocabello">Cuidado de cabello</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tipo" value="masaje">
                    <label class="form-check-label" for="masaje">Masaje</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tipo" value="mesoterapia">
                    <label class="form-check-label" for="mesoterapia">Mesoterapia</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tipo" value="fotodepilacion">
                    <label class="form-check-label" for="fotodepilacion">Fotodepilacion</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tipo" value="bronceado">
                    <label class="form-check-label" for="bronceado">Bronceado</label>
                </div><br>



                <div class="form-group">
                    <label for="centro_id">ID del centro</label>
                    <input type="text" name="centro_id" id="centro_id" class="form-control" placeholder="Id del centro">
                    </label>
                </div>

                <select class="form-select" aria-label="Default select example" name="centro_nombre">
                    <option selected value="peluqueria">peluqueria</option>
                    <option value="centroestetica">centro estetica</option>
                   
                </select>




                <input type="submit" value="Crear" class="btn btn-success">
            </form>





        </div>
    </div>
</div>
@endsection